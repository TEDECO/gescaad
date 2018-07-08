<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = Yii::t('app', 'Update Course: ' . $model->cou_id, [
    'nameAttribute' => '' . $model->cou_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cou_id, 'url' => ['view', 'id' => $model->cou_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsHasVideo' => $modelsHasVideo,
    ]) ?>

</div>
