<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OperatingSystem */

$this->title = $model->ope_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operating Systems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operating-system-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ope_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ope_id], [
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
            'ope_id',
            'ope_name',
        ],
    ]) ?>

</div>
