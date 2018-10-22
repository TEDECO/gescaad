#!/bin/sh
# Script for easy project root installation (yii2, gescaad project).

COMPOSER="composer.phar"

php56 $COMPOSER create-project --prefer-dist yiisoft/yii2-app-advanced gescaad-5.6

cd gescaad-5.6

php56 ../$COMPOSER require mdmsoft/yii2-admin "~2.0"
php56 ../$COMPOSER require --prefer-dist wbraganca/yii2-dynamicform "*"
php56 ../$COMPOSER require kartik-v/yii2-widgets "*"
php56 ../$COMPOSER require kartik-v/yii2-grid "@dev"
php56 ../$COMPOSER require --prefer-dist cetver/yii2-language-selector
#php56 ../$COMPOSER require 
#php56 ../$COMPOSER require
#php56 ../$COMPOSER require
#php56 ../$COMPOSER require
#php56 ../$COMPOSER require
php56 init
