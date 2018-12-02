<?php

use yii\helpers\Html;
// use kartik\grid\GridView;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Videos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Video'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => '\kartik\grid\SerialColumn'],

            // 'vid_id',
            'vid_name',
            [
                'attribute' => 'languageLocalization_lan_id',
                'value' => function ($model, $key, $index, $column) {
                    return $model->languageLocalizationLan->lan_id;
                },
                'filter' => Html::activeDropDownList($searchModel, 'languageLocalization_lan_id', $searchModel->LanguageLocalizationList, [
                    'class' => 'form-control',
                    'prompt' => Yii::t('app', 'select video language').'...',
                ])
            ],          
            'vid_duration',
            'vid_file',
            // 'vid_url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
