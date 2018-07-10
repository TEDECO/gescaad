<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OperatingSystem */

$this->title = Yii::t('app', 'Create Operating System');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operating Systems'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operating-system-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
