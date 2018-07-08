<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseComposition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-composition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_cou_id')->textInput() ?>

    <?= $form->field($model, 'video_vid_id')->textInput() ?>

    <?= $form->field($model, 'cco_order')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
