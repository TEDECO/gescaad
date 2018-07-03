<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VideoGoals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-goals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'video_vid_id')->textInput() ?>

    <?= $form->field($model, 'competency_com_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
