<?php

/* @var $this yii\web\View */
$this->title = 'GESCAAD - GEstión de Contenido Audiovisual para Alfabetización Digital';
?>
<div class="site-index">

	<div class="jumbotron">
		<h1><?php echo Yii::t('app', 'Wellcome to administration of GESCAAD')?></h1>

		<p class="lead"><?php echo Yii::t('app', 'Catalog portal for digital literacy courses.')?></p>
	</div>

	<div class="body-content">

		<div class="row">
			<div class="row">
				<div class="col-lg-4">
					<h2><?=  Yii::t('app', 'User assignments')?></h2>
					<p>
						<a class="btn btn-default"
							href="<?= Yii::$app->getUrlManager()->createUrl('admin') ?>"><?=  Yii::t('app', 'Access') ?></a>
					</p>
				</div>
				<div class="col-lg-4">
					<h2><?=  Yii::t('app', 'Users')?></h2>
					<p>
						<a class="btn btn-default"
							href="<?= Yii::$app->getUrlManager()->createUrl('admin/user') ?>"><?=  Yii::t('app', 'Access') ?></a>
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
			<div class="col-lg-4">
				<h2><?= Yii::t('app', 'Languages') ?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('language/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
				</p>
			</div>
			<div class="col-lg-4">
				<h2><?=  Yii::t('app', 'Operating systems')?></h2>
				<p>
					<a class="btn btn-default"
						href="<?= Yii::$app->getUrlManager()->createUrl('operatingsystem/index') ?>"><?=  Yii::t('app', 'Access') ?></a>
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
	</div>
</div>
