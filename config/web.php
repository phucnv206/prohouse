<?php

$params = require(__DIR__ . '/params.php');
$config = [
    'language' => 'en-US',
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
                '<module:admincp>' => '<module>',
                '<module:admincp>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '/s/for/<for:\d+>' => 'site/search',
                's/type/<type:\d+>' => 'site/search',
                's' => 'site/search',
                'p/<id:\d+>' => 'product/index',
                'c/<id:\d+>' => 'category/index',
                'n/<id:\d+>' => 'post/index',
                'contact' => 'site/contact',
                'location' => 'site/location',
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
                'host' => 'shost011.tenten.vn',
                'username' => '	info@prohouse.vn',
                'password' => 'C0nM3oTr3oC@y',
                'port' => '465',
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
