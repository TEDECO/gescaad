<?php

use common\models\LanguageLocalization;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VideoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

		<div class="row">
	<div class="col-lg-4">
    <?= $form->field($model, 'vid_id') ?>
    </div>
    
	<div class="col-lg-4">
    <?= $form->field($model, 'vid_name') ?>
	</div>
	
	<div class="col-lg-4">
    <?= $form->field($model, 'languageLocalization_lan_id')->dropDownList(LanguageLocalization::getList(), [
                    'prompt' => Yii::t('app', 'select video language').'...',
                ])?>
	</div>
	
	<div class="col-lg-4">
    <?= $form->field($model, 'vid_duration') ?>
	</div>
	
	<div class="col-lg-4">
    <?= $form->field($model, 'vid_file') ?>
	</div>
	</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
