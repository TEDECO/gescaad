<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\VideoGoals */

$this->title = Yii::t('app', 'Create Video Goals');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Video Goals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-goals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
