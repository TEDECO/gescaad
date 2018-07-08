<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\VideoGoals */

$this->title = Yii::t('app', 'Update Video Goals: ' . $model->vig_id, [
    'nameAttribute' => '' . $model->vig_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Goals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vig_id, 'url' => ['view', 'vig_id' => $model->vig_id, 'video_vid_id' => $model->video_vid_id, 'competency_com_id' => $model->competency_com_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="video-goals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
