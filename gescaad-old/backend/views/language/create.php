<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LanguageLocalization */

$this->title = Yii::t('app', 'Create Language Localization');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Language Localizations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-localization-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
