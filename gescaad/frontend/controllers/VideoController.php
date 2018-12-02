<?php
namespace frontend\controllers;

use Yii;
use common\models\Competency;
use common\models\Video;
use common\models\VideoSearch;
use common\controllers\AppController;
use yii\BaseYii;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use common\models\HasCompetency;
use common\models\ModelHasCompetency;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends AppController
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
                            'Producer',
							'Supervisor'
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
                    ]
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
     * Lists all Video models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Displays a single Video model.
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
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Video();
        $modelsHasCompetency = [
            new HasCompetency()
        ];
        
        if ($model->load(Yii::$app->request->post())) {
            
            $modelsHasCompetency = ModelHasCompetency::createMultiple(HasCompetency::classname());
            ModelHasCompetency::loadMultiple($modelsHasCompetency, Yii::$app->request->post());
            
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(ActiveForm::validateMultiple($modelsHasCompetency), ActiveForm::validate($model));
            }
            
            // validate all models
            $valid = $model->validate();
            $valid = ModelHasCompetency::validateMultiple($modelsHasCompetency) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsHasCompetency as $modelHasCompetency) {
                            $modelHasCompetency->video_vid_id = $model->vid_id;
                            if (! ($flag = $modelHasCompetency->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect([
                            'view',
                            'id' => $model->vid_id
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
            'modelsHasCompetency' => (empty($modelsHasCompetency)) ? [
                new HasCompetency()
            ] : $modelsHasCompetency
        ]);
    }

    /**
     * Updates an existing Video model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsHasCompetency = $model->hasCompetencies;
        $oldIDs = HasCompetency::getIDArray($modelsHasCompetency);
        
        BaseYii::Debug("OLDIDS: " . implode("|", $oldIDs));
        
        if ($model->load(Yii::$app->request->post())) {
            
            $modelsHasCompetency = ModelHasCompetency::createMultiple(HasCompetency::classname(), $modelsHasCompetency);
            ModelHasCompetency::loadMultiple($modelsHasCompetency, Yii::$app->request->post());
            
            // checks for deleted competencies
            $deletedCompetenciesID = array_diff($oldIDs, HasCompetency::getIDArray($modelsHasCompetency));
            
            BaseYii::Debug("DELETEDIDS: " . implode("|", $deletedCompetenciesID));
            
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(ActiveForm::validateMultiple($modelsHasCompetency), ActiveForm::validate($model));
            }
            
            // validate all models
            $valid = $model->validate();
            $valid = ModelHasCompetency::validateMultiple($modelsHasCompetency) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        // Delete erased HasCompetencies relations
                        if (! empty($deletedCompetenciesID)) {
                            HasCompetency::deleteAllbyID($deletedCompetenciesID);
                        }
                        foreach ($modelsHasCompetency as $modelHasCompetency) {
                            $modelHasCompetency->video_vid_id = $model->vid_id;
                            if (! ($flag = $modelHasCompetency->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect([
                            'view',
                            'id' => $model->vid_id
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
            'modelsHasCompetency' => (empty($modelsHasCompetency)) ? [
                new HasCompetency()
            ] : $modelsHasCompetency
        ]);
    }

    /**
     * Deletes an existing Video model.
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
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     * @return Video the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Video::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     *
     * @param string $q
     * @param integer $id
     * @return string[][]|array[]|NULL[][]
     */
    public function actionCompetencyList($q = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $out = [
            'results' => [
                'id' => '',
                'text' => ''
            ]
        ];
        
        if (! is_null($q)) {
            $data = Competency::find()->select([
                'com_id AS id',
                'com_name AS text'
            ])
                ->where([
                'or',
                [
                    'like',
                    'com_name',
                    "$q"
                ],
                [
                    'like',
                    'com_description',
                    "$q"
                ]
            ])
                ->limit(20)
                ->asArray()
                ->all();
            $out['results'] = $data;
        } elseif ($id > 0) {
            $out['results'] = [
                'id' => $id,
                'text' => Competency::findOne($id)->name
            ];
        }
        return $out;
    }
}
