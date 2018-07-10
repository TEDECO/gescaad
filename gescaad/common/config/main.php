<?php
return [
    'language' => 'es-ES',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
        '@mdm/admin' => '@vendor/mdmsoft/yii2-admin'
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module'
        ]
    ],
    /*
    'bootstrap' => [
        [
            'class' => 'common\components\LanguageSelector',
            'supportedLanguages' => ['en', 'es'],
        ],
    ],
    */
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
        'user' => [
            // 'class' => 'mdm\admin\models\User',
            'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => [
                'admin/user/login'
            ]
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en-US'
                ],
                /*
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
                */
            ]
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>'
            )
        ],
    ]
];
