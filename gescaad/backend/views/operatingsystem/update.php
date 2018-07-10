<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OperatingSystem */

$this->title = Yii::t('app', 'Update Operating System: ' . $model->ope_id, [
    'nameAttribute' => '' . $model->ope_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operating Systems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ope_id, 'url' => ['view', 'id' => $model->ope_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="operating-system-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
