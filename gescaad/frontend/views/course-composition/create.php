<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseComposition */

$this->title = Yii::t('app', 'Create Course Composition');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Compositions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-composition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
