<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Competency */

$this->title = Yii::t('app', 'Create Competency');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Competencies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competency-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
