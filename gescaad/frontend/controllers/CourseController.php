<?php
namespace frontend\controllers;

use Yii;
use common\models\Course;
use common\models\CourseSearch;
use common\models\HasVideo;
use common\controllers\AppController;
use yii\BaseYii;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use common\models\ModelHasVideo;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends AppController
{

    /**
     *
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
			'access' => [
                'class' => AccessControl::className(),
        		'only' => [
                    'create',
                    'update',
                    'delete'
                ],
                'rules' => [
                    [
                        'actions' => [
                            'create',
                            'update'
                        ],
                        'allow' => true,
                        'roles' => [
                            'Producer,Supervisor'
                        ]
                    ],
                    [
                        'actions' => [
                            'delete'
                        ],
                        'allow' => true,
                        'roles' => [
                            'Supervisor'
                        ]
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => [
                        'POST'
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Course models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Course model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id)
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();
        $modelsHasVideo = [
            new HasVideo()
        ];
        
        if ($model->load(Yii::$app->request->post())) {
            
            $modelsHasVideo = ModelHasVideo::createMultiple(HasVideo::classname());
            ModelHasVideo::loadMultiple($modelsHasVideo, Yii::$app->request->post());
            
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(ActiveForm::validateMultiple($modelsHasVideo), ActiveForm::validate($model));
            }
            
            // validate all models
            $valid = $model->validate();
            $valid = ModelHasVideo::validateMultiple($modelsHasVideo) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsHasVideo as $modelHasVideo) {
                            $modelHasVideo->course_cou_id = $model->cou_id;
                            if (! ($flag = $modelHasVideo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect([
                            'view',
                            'id' => $model->cou_id
                        ]);
                    }
                } catch (\Exception $e) {
                    BaseYii::Debug("EXCEPTION: " . $e->getMessage());
                    $transaction->rollBack();
                }
            }
        }
        
        return $this->render('create', [
            'model' => $model,
            'modelsHasVideo' => (empty($modelsHasVideo)) ? [
                new HasVideo()
            ] : $modelsHasVideo
        ]);
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsHasVideo = $model->hasVideos;
        $oldIDs = HasVideo::getIDArray($modelsHasVideo);
        
        BaseYii::Debug("OLDIDS: " . implode("|", $oldIDs));
        
        if ($model->load(Yii::$app->request->post())) {
            
            $modelsHasVideo = ModelHasVideo::createMultiple(HasVideo::classname(), $modelsHasVideo);
            ModelHasVideo::loadMultiple($modelsHasVideo, Yii::$app->request->post());
            
            // checks for deleted competencies
            $deletedVideosID = array_diff($oldIDs, HasVideo::getIDArray($modelsHasVideo));
            
            BaseYii::Debug("DELETEDIDS: " . implode("|", $deletedVideosID));
            
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(ActiveForm::validateMultiple($modelsHasVideo), ActiveForm::validate($model));
            }
            
            // validate all models
            $valid = $model->validate();
            $valid = ModelHasVideo::validateMultiple($modelsHasVideo) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        // Delete erased HasVideos relations
                        if (! empty($deletedVideosID)) {
                            HasVideo::deleteAllbyID($deletedVideosID);
                        }
                        foreach ($modelsHasVideo as $modelHasVideo) {
                            $modelHasVideo->course_cou_id = $model->cou_id;
                            if (! ($flag = $modelHasVideo->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect([
                            'view',
                            'id' => $model->cou_id
                        ]);
                    }
                } catch (\Exception $e) {
                    BaseYii::Debug("EXCEPTION: " . $e->getMessage());
                    $transaction->rollBack();
                }
            }
        }
        
        return $this->render('update', [
            'model' => $model,
            'modelsHasVideo' => (empty($modelsHasVideo)) ? [
                new HasVideo()
            ] : $modelsHasVideo
        ]);
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return $this->redirect([
            'index'
        ]);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
