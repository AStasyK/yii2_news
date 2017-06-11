<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'yii2_news',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'charset'  => 'UTF-8',
    'language' => 'ru_RU',
    'layout'   => 'layout',
    'name'     => 'Учебное приложение',
	'defaultRoute' => 'main',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'secret',
			'baseUrl' => '/yii2_news',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'main/error',
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl'     => true,
            'showScriptName'      => false,
            'enableStrictParsing' => false,
            'rules' => [
                [
                    'pattern' => '',
                    'route'   => 'main/index',
                    'suffix'  => '',
                ],
				[
                    'pattern' => '<controller>/<action>/<id:\d+>',
                    'route'   => '<controller>/<action>',
                    'suffix'  => '',
                ],
				[
                    'pattern' => '<controller>/<action>',
                    'route'   => '<controller>/<action>',
                    'suffix'  => '',
                ],
				[
                    'pattern' => '<module>/<controller>/<action>/<id:\d+>',
                    'route'   => '<controller>/<action>',
                    'suffix'  => '',
                ],
				[
                    'pattern' => '<module>/<controller>/<action>',
                    'route'   => '<controller>/<action>',
                    'suffix'  => '',
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'php:d.m.Y',
            'datetimeFormat' => 'php:j F, H:i',
            'timeFormat' => 'php:H:i:s',
            'defaultTimeZone' => 'Europe/Moscow',
            'locale' => 'ru-RU'
        ],
    ],
    'params' => $params
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
