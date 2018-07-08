<?php

namespace frontend\controllers;

use Yii;
use common\models\VideoGoals;
use common\models\VideoGoalsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideoGoalsController implements the CRUD actions for VideoGoals model.
 */
class VideoGoalsController extends Controller
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
     * Lists all VideoGoals models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VideoGoalsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VideoGoals model.
     * @param integer $vig_id
     * @param integer $video_vid_id
     * @param integer $competency_com_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($vig_id, $video_vid_id, $competency_com_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($vig_id, $video_vid_id, $competency_com_id),
        ]);
    }

    /**
     * Creates a new VideoGoals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VideoGoals();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vig_id' => $model->vig_id, 'video_vid_id' => $model->video_vid_id, 'competency_com_id' => $model->competency_com_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VideoGoals model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $vig_id
     * @param integer $video_vid_id
     * @param integer $competency_com_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($vig_id, $video_vid_id, $competency_com_id)
    {
        $model = $this->findModel($vig_id, $video_vid_id, $competency_com_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'vig_id' => $model->vig_id, 'video_vid_id' => $model->video_vid_id, 'competency_com_id' => $model->competency_com_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing VideoGoals model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $vig_id
     * @param integer $video_vid_id
     * @param integer $competency_com_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($vig_id, $video_vid_id, $competency_com_id)
    {
        $this->findModel($vig_id, $video_vid_id, $competency_com_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VideoGoals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $vig_id
     * @param integer $video_vid_id
     * @param integer $competency_com_id
     * @return VideoGoals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($vig_id, $video_vid_id, $competency_com_id)
    {
        if (($model = VideoGoals::findOne(['vig_id' => $vig_id, 'video_vid_id' => $video_vid_id, 'competency_com_id' => $competency_com_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
