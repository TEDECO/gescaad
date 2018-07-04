<?php

/* @var $this yii\web\View */
$this->title = 'GESCAAD - GEstión de Contenido Audiovisual para Alfabetización Digital';
?>
<div class="site-index">

	<div class="jumbotron">
		<h1><?php echo Yii::t('app', 'Wellcome to GESCAD')?></h1>

		<p class="lead"><?php echo Yii::t('app', 'Catalog portal for digital literacy courses.')?></p>
		<p class="lead"><?php echo Yii::t('app', 'An acronym of words in Spanish meaning')?><span
				class='remark'>"GE</span>stión de <span class='remark'>C</span>ontenido
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
				<h2><?= Yii::t('app', 'Course catalog') ?></h2>
				<p><?=  Yii::t('app', 'Here you can consult the digital literacy courses available.')?>.</p>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('course/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Video catalog')?></h2>
				<p><?=  Yii::t('app', 'Here you can consult the video digital literacy formation pills available.')?>.</p>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('video/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Competency catalog')?></h2>
				<p><?=  Yii::t('app', 'Here you can consult the goals obtainable with the current video digital literacy formation pills available.')?>.</p>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('competency/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Other resources and information')?></h2>
				<p><?=  Yii::t('app', 'Information area and additional resources.')?>.</p>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('site/information') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
</div>
