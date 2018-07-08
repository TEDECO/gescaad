<?php

namespace frontend\controllers;

use Yii;
use common\models\CourseComposition;
use common\models\CourseCompositionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CourseCompositionController implements the CRUD actions for CourseComposition model.
 */
class CourseCompositionController extends Controller
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
     * Lists all CourseComposition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseCompositionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CourseComposition model.
     * @param integer $cco_id
     * @param integer $course_cou_id
     * @param integer $video_vid_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cco_id, $course_cou_id, $video_vid_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($cco_id, $course_cou_id, $video_vid_id),
        ]);
    }

    /**
     * Creates a new CourseComposition model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CourseComposition();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cco_id' => $model->cco_id, 'course_cou_id' => $model->course_cou_id, 'video_vid_id' => $model->video_vid_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CourseComposition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $cco_id
     * @param integer $course_cou_id
     * @param integer $video_vid_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cco_id, $course_cou_id, $video_vid_id)
    {
        $model = $this->findModel($cco_id, $course_cou_id, $video_vid_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cco_id' => $model->cco_id, 'course_cou_id' => $model->course_cou_id, 'video_vid_id' => $model->video_vid_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CourseComposition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $cco_id
     * @param integer $course_cou_id
     * @param integer $video_vid_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cco_id, $course_cou_id, $video_vid_id)
    {
        $this->findModel($cco_id, $course_cou_id, $video_vid_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CourseComposition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $cco_id
     * @param integer $course_cou_id
     * @param integer $video_vid_id
     * @return CourseComposition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cco_id, $course_cou_id, $video_vid_id)
    {
        if (($model = CourseComposition::findOne(['cco_id' => $cco_id, 'course_cou_id' => $course_cou_id, 'video_vid_id' => $video_vid_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
