<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'home/index/index',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@phpqrcode' => '@vendor/phpqrcode',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Y0Sn7Ktyyk0l60_9yJiBkJfZ14Jqw_DeaA5pjNtPE4EuM-qvzietJ0a9OIT63dio4pW98ymEnLEhWAC0oyx55g==',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'text/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
//        'urlManager' => [
//            'enablePrettyUrl' => true,
//            'showScriptName' => false,
//            'suffix'=>'.html',
//            'rules' => [
//                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//            ],
//        ],
//        'urlManager'=>[
//            'urlFormat'=>'path',
//            'showScriptName'=>false, //去除index.php
//            //'urlSuffix'=>'.html', //加上.html
//            'rules'=>[
//                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//            ],
//        ],

    ],
    //加载自定义模块配置，路由规则为 index.php?r=模块/控制器/操作
    'modules' => [
        'home' => [
            'class' => 'app\modules\home\Home',
        ],
        'api' => [
            'class' => 'app\modules\api\Index',
        ],
        'pay' => [
            'class' => 'app\modules\pay\Index',
        ],
        'admin' => [
            'class' => 'app\modules\admin\Index',
        ],
        'user' => [
            'class' => 'app\modules\user\User',
        ],
        'm' => [
            'class' => 'app\modules\mobile\Index',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
