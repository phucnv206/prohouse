<?php

$params = require(__DIR__ . '/params.php');
$config = [
    'language' => 'vi-VN',
    'id' => 'prohouse',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'init'],
    'modules' => [
        'admincp' => [
            'class' => 'app\modules\admincp\Module',
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],
    'components' => [
        'init' => [
            'class' => 'app\components\Init'
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => false,
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                '<module:admincp|api>' => '<module>',
                '<module:admincp|api>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
//                'location' => 'site/location',
//                '<url.*>' => 'site/index',
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'A1JEbLV4GlKb086KZsmni1JRiL7qKbgr',
        ],
        'formatter' => [
            'thousandSeparator' => '.',
        ],
        'user' => [
            'identityClass' => 'app\modules\admincp\models\User',
            'enableAutoLogin' => true,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'pinut.com.vn@gmail.com',
                'password' => 'C0nM3o123',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
//        'log' => [
//            'traceLevel' => YII_DEBUG ? 3 : 0,
//            'targets' => [
//                [
//                    'class' => 'yii\log\FileTarget',
//                    'levels' => ['error', 'warning', 'info'],
//                    'categories' => ['yii\db\Command::query'],
//                    'logVars' => [],
//                ],
//            ],
//        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = [
//        'class' => 'yii\debug\Module',
//    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
