<?php

/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    $languageItem = new cetver\LanguageSelector\items\DropDownLanguageItem([
        'languages' => [
            'en' => '<span class="flag-icon flag-icon-us"></span> ' . Yii::t('app', 'English'),
            'es-ES' => '<span class="flag-icon flag-icon-es"></span> ' . Yii::t('app', 'Spanish')
        ],
        'options' => [
            'encode' => false
        ]
    ]);
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top'
        ]
    ]);
    $menuItems = [
        [
            'label' => Yii::t('app', 'Home'),
            'url' => [
                '/site/index'
            ]
        ],
        [
            'label' => Yii::t('app', 'Frontend'),
            'url' => Yii::$app->urlManagerFrontend->createAbsoluteUrl("/")
        ]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = [
            'label' => Yii::t('app', 'Login'),
            'url' => [
                '/site/login'
            ]
        ];
    } else {
        $menuItems[] = '<li>' . Html::beginForm([
            '/site/logout'
        ], 'post') . Html::submitButton(Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')', [
            'class' => 'btn btn-link logout'
        ]) . Html::endForm() . '</li>';
    }
    $menuItems[] = $languageItem->toArray();
    echo Nav::widget([
        'options' => [
            'class' => 'navbar-nav navbar-right'
        ],
        'items' => $menuItems
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
	</div>

	<footer class="footer">
		<div class="container">
			<p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

			<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>