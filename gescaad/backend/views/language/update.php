<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LanguageLocalization */

$this->title = Yii::t('app', 'Update Language Localization: ' . $model->lan_id, [
    'nameAttribute' => '' . $model->lan_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Language Localizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lan_id, 'url' => ['view', 'id' => $model->lan_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="language-localization-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
