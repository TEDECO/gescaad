<?php
use common\models\LanguageLocalization;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vid_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'languageLocalization_lan_id')->dropDownList(LanguageLocalization::getList(), [
                    'prompt' => Yii::t('app', 'select video language').'...',
                ])?>
                
    <?= $form->field($model, 'vid_duration')->textInput() ?>

    <?= $form->field($model, 'vid_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vid_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
