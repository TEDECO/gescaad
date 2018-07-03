<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = Yii::t('app', 'Update Video: ' . $model->vid_id, [
    'nameAttribute' => '' . $model->vid_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Videos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vid_id, 'url' => ['view', 'id' => $model->vid_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="video-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
