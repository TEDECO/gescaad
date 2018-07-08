<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VideoRequirements */

$this->title = Yii::t('app', 'Update Video Requirements: ' . $model->vir_id, [
    'nameAttribute' => '' . $model->vir_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Requirements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vir_id, 'url' => ['view', 'vir_id' => $model->vir_id, 'video_vid_id' => $model->video_vid_id, 'competency_com_id' => $model->competency_com_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="video-requirements-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
