<?php

namespace frontend\controllers;

use Yii;
use common\controllers\AppController;
use common\models\Video;
use common\models\VideoSearch;
use common\models\VideoGoals;
use common\models\VideoRequirements;
use common\models\Model;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\base\Exception;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * VideoController implements the CRUD actions for Video model.
 */
class VideoController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Video models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Video model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Video model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Video();
        $modelsVideoGoals = [new VideoGoals];
        $modelsVideoRequirements = [new VideoRequirements];

        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vid_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        */
        
        /*
        if ($model->load(Yii::$app->request->post())) {
            
            $modelsVideoGoals = Model::createMultiple(VideoGoals::classname());
            $modelsVideoRequirements = Model::createMultiple(VideoRequirements::classname());
            Model::loadMultiple($modelsVideoGoals, Yii::$app->request->post());
            Model::loadMultiple($modelsVideoRequirements, Yii::$app->request->post());
            
            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsVideoRequirements),
                    ActiveForm::validateMultiple($modelsVideoGoals),
                    ActiveForm::validate($model)
                    );
            }
            
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsVideoGoals) && $valid;
            $valid = Model::validateMultiple($modelsVideoRequirements) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsVideoGoals as $modelVideoGoals) {
                            $modelVideoGoals->video_vid_id = $model->vid_id;
                            if (! ($flag = $modelVideoGoals->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        
                        foreach ($modelsVideoRequirements as $modelVideoRequirements) {
                            $modelVideoRequirements->video_vid_id = $model->vid_id;
                            if (! ($flag = $modelVideoRequirements->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->vid_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        */
        return $this->render('create', [
            'model' => $model,
            'modelsVideoGoals' => (empty($modelsVideoGoals)) ? [new VideoGoals] : $modelsVideoGoals,
            'modelsVideoRequirements' => (empty($modelsVideoRequirements)) ? [new VideoRequirements] : $modelsVideoRequirements
        ]);
    }

    /**
     * Updates an existing Video model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->vid_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Video model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Video model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
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
}
