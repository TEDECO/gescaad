<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\VideoGoals */

$this->title = $model->vig_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Goals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-goals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'vig_id' => $model->vig_id, 'video_vid_id' => $model->video_vid_id, 'competency_com_id' => $model->competency_com_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'vig_id' => $model->vig_id, 'video_vid_id' => $model->video_vid_id, 'competency_com_id' => $model->competency_com_id], [
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
            'vig_id',
            'video_vid_id',
            'competency_com_id',
        ],
    ]) ?>

</div>
