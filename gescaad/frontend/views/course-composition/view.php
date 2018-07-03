<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CourseComposition */

$this->title = $model->cco_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Compositions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-composition-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'cco_id' => $model->cco_id, 'course_cou_id' => $model->course_cou_id, 'video_vid_id' => $model->video_vid_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'cco_id' => $model->cco_id, 'course_cou_id' => $model->course_cou_id, 'video_vid_id' => $model->video_vid_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cco_id',
            'course_cou_id',
            'video_vid_id',
            'cco_order',
        ],
    ]) ?>

</div>
