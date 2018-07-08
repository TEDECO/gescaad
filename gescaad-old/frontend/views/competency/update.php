<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Competency */

$this->title = Yii::t('app', 'Update Competency: ' . $model->com_id, [
    'nameAttribute' => '' . $model->com_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Competencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->com_id, 'url' => ['view', 'id' => $model->com_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="competency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
