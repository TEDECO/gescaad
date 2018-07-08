<?php
use common\models\LanguageLocalization;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;
use common\models\HasCompetency;
use common\models\Competency;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\widgets\ActiveForm */

// The controller action that will render the list (Competencies)
// $url = Url::to(['competency-list']);

?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
        'id' => 'dynamic-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'options'=>['enctype'=>'multipart/form-data']
    ]);
    ?>

	<div class="row">
		<div class="col-lg-8">
    		<?= $form->field($model, 'vid_name')->textInput(['maxlength' => true]) ?>
    	</div>
 		<div class="col-lg-4">   
    		<?=$form->field($model, 'languageLocalization_lan_id')->dropDownList(LanguageLocalization::getList(), [
                'prompt' => Yii::t('app', 'select video language') . '...'])?>
    	</div>
  		<div class="col-lg-4">     	
    		<?= $form->field($model, 'vid_duration')->textInput() ?>
    	</div>
 		<div class="col-lg-4">  
    		<?= $form->field($model, 'vid_file')->textInput(['maxlength' => true]) ?>
    	</div>
 		<div class="col-lg-4">  
    		<?= $form->field($model, 'vid_url')->textInput(['maxlength' => true]) ?>
     	</div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-education"></i><?= ' ' . Yii::t('app', 'Video goals and requirements') ?></h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsHasCompetency[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'competency_com_id',
                    'hco_type'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsHasCompetency as $i => $modelHasCompetency): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
					<div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (! $modelHasCompetency->isNewRecord) {
                            echo Html::activeHiddenInput($modelHasCompetency, "[{$i}]hco_id");
                        }
                        ?>
                        <div class="row">
                            <div class="col-sm-8">
                            <?php 
                            // Get the initial competency value
                            /*
                             *  Doesn't work with second, trd, etc competencies.
                             *  Kartik-v, select2, Ajax searh working for first element only.
                             *                             
                            $competencyName = empty($modelHasCompetency->CompetencyCom) ? '' : Competency::findOne($modelHasCompetency->CompetencyCom)->name;
                            
                            echo $form->field($modelHasCompetency, "[{$i}]competency_com_id")->widget(Select2::classname(), [
                                'initValueText' => $competencyName, // set the initial display text
                                'options' => ['placeholder' => 'search for a competency...'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'minimumInputLength' => 3,
                                    'language' => [
                                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                    ],
                                    'ajax' => [
                                        'url' => $url,
                                        'dataType' => 'json',
                                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                    ],
                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                    'templateResult' => new JsExpression('function(competency) { return competency.text; }'),
                                    'templateSelection' => new JsExpression('function (competency) { return competency.text; }'),
                                ],
                            ]);
                            */
                            ?>
                                <?= $form->field($modelHasCompetency, "[{$i}]competency_com_id")->dropDownList(Competency::getList(), [
                                    'prompt' => Yii::t('app', 'select competency') . '...']) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelHasCompetency, "[{$i}]hco_type")->dropDownList(HasCompetency::getCompetencyOptions(), [
                                    'prompt' => Yii::t('app', 'select competency type') . '...'])?>
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