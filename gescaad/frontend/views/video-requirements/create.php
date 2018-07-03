<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoRequirements */

$this->title = Yii::t('app', 'Create Video Requirements');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Requirements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-requirements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
