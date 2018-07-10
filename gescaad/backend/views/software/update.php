<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Software */

$this->title = Yii::t('app', 'Update Software: ' . $model->sof_id, [
    'nameAttribute' => '' . $model->sof_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Softwares'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sof_id, 'url' => ['view', 'id' => $model->sof_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="software-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
