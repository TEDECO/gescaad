#!/bin/sh
# Script for easy project root installation (yii2, gescaad project).

COMPOSER="composer.phar"
php56="php"

$COMPOSER create-project --prefer-dist yiisoft/yii2-app-advanced gescaad-5.6

cd gescaad-5.6

$php56 init
$COMPOSER require mdmsoft/yii2-admin "~2.0"
$COMPOSER require --prefer-dist wbraganca/yii2-dynamicform "*"
$COMPOSER require kartik-v/yii2-widgets "*"
$COMPOSER require kartik-v/yii2-grid "@dev"
$COMPOSER require --prefer-dist cetver/yii2-language-selector
