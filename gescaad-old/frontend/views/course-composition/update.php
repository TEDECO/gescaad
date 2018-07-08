<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseComposition */

$this->title = Yii::t('app', 'Update Course Composition: ' . $model->cco_id, [
    'nameAttribute' => '' . $model->cco_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Compositions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cco_id, 'url' => ['view', 'cco_id' => $model->cco_id, 'course_cou_id' => $model->course_cou_id, 'video_vid_id' => $model->video_vid_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="course-composition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
