<?php

namespace frontend\controllers;

use Yii;
use common\models\VideoRequirements;
use common\models\VideoRequirementsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideoRequirementsController implements the CRUD actions for VideoRequirements model.
 */
class VideoRequirementsController extends Controller
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
     * Lists all VideoRequirements models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoRequirementsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VideoRequirements model.
     * @param integer $vir_id
     * @param integer $video_vid_id
     * @param integer $competency_com_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($vir_id, $video_vid_id, $competency_com_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($vir_id, $video_vid_id, $competency_com_id),
        ]);
    }

    /**
     * Creates a new VideoRequirements model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VideoRequirements();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vir_id' => $model->vir_id, 'video_vid_id' => $model->video_vid_id, 'competency_com_id' => $model->competency_com_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VideoRequirements model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $vir_id
     * @param integer $video_vid_id
     * @param integer $competency_com_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($vir_id, $video_vid_id, $competency_com_id)
    {
        $model = $this->findModel($vir_id, $video_vid_id, $competency_com_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vir_id' => $model->vir_id, 'video_vid_id' => $model->video_vid_id, 'competency_com_id' => $model->competency_com_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VideoRequirements model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $vir_id
     * @param integer $video_vid_id
     * @param integer $competency_com_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($vir_id, $video_vid_id, $competency_com_id)
    {
        $this->findModel($vir_id, $video_vid_id, $competency_com_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VideoRequirements model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $vir_id
     * @param integer $video_vid_id
     * @param integer $competency_com_id
     * @return VideoRequirements the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($vir_id, $video_vid_id, $competency_com_id)
    {
        if (($model = VideoRequirements::findOne(['vir_id' => $vir_id, 'video_vid_id' => $video_vid_id, 'competency_com_id' => $competency_com_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
