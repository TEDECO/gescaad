<?php

use common\models\Video;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'options'=>['enctype'=>'multipart/form-data']
    ]); 
    ?>

    <?= $form->field($model, 'cou_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cou_totalDuration')->textInput(['readOnly'=> true]) ?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-film"></i><?= ' ' . Yii::t('app', 'Video chapter composition') ?></h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsHasVideo[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'hvi_order',
                    'video_vid_id'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsHasVideo as $i => $modelHasVideo): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
					<div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (! $modelHasVideo->isNewRecord) {
                            echo Html::activeHiddenInput($modelHasVideo, "[{$i}]hvi_id");
                        }
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelHasVideo, "[{$i}]hvi_order")->textInput() ?>
                            </div>
                            <div class="col-sm-8">
                                <?= $form->field($modelHasVideo, "[{$i}]video_vid_id")->dropDownList(Video::getList(), [
                                    'prompt' => Yii::t('app', 'select video') . '...']) ?>
                            </div>
                            <div class="pull-right">
                            	<button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            	<button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        	</div>
                        	<div class="clearfix"></div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
$(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
    console.log("beforeInsert");
});

$(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    console.log("afterInsert");
});

$(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
    if (! confirm("Are you sure you want to delete this item?")) {
        return false;
    }
    return true;
});

$(".dynamicform_wrapper").on("afterDelete", function(e) {
    console.log("Deleted item!");
});

$(".dynamicform_wrapper").on("limitReached", function(e, item) {
    alert("Limit reached");
});

JS;
$this->registerJs($script);
?>
