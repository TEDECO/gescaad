<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LanguageLocalization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="language-localization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lan_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lan_naturalReaderCompatible')->radioList(array('1'=>Yii::t('app', 'Yes'),'0'=>Yii::t('app', 'No'))); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
