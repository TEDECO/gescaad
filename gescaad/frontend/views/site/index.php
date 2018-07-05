<?php

/* @var $this yii\web\View */
$this->title = 'GESCAAD - GEstión de Contenido Audiovisual para Alfabetización Digital';
?>
<div class="site-index">

	<div class="jumbotron">
		<h1><?php echo Yii::t('app', 'Wellcome to administration of GESCAAD')?></h1>

		<p class="lead"><?php echo Yii::t('app', 'Catalog portal for digital literacy courses.')?></p>
		<p class="lead"><?php echo Yii::t('app', 'An acronym of words in Spanish meaning "')?><span
				class='remark'>GES</span>tión de <span class='remark'>C</span>ontenido
			<span class='remark'>A</span>udiovisual para <span class='remark'>A</span>lfabetización
			<span class='remark'>D</span>igital"
		</p>
		<p>
			<a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get
				started with Yii</a>
		</p>
	</div>

	<div class="body-content">

		<div class="row">
			<div class="col-lg-4">
				<h2><?= Yii::t('app', 'Languajes') ?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('languaje-localization/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Operating systems')?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('operating-system/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Software')?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('software/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<h2><?= Yii::t('app', 'Courses') ?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('course/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Videos')?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('video/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Competencies')?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('competency/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Assignments')?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('admin') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
</div>
