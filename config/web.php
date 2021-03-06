<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'language'=>'es',
    'timeZone' => 'America/Guayaquil',
    'bootstrap' => ['log'],
    'components' => [
        'urlManager' => [
          'showScriptName' => false,
          'enablePrettyUrl' => true
        ], 
            'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'my_application_cart',
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9te1HJt3rRCqy9bQvMN2Ly5Z9f6t1Ouv',
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
        // 'request' => [
        //     'class' => 'yii\components\Request',
        //      'enableCookieValidation' => false,
        //     'enableCsrfValidation' => true,
        //     'cookieValidationKey' => 'chaide123',
        //     // 'noCsrfRoutes' => [
        //     //     'shop/dreturn','dcancel','dpostprocess'
        //     // ]
        // ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
                        'transport' => [
            'class' => 'Swift_SmtpTransport',
            'host' => 'mail.webcontent.ec',
            'username' => 'info@webcontent.ec',
            'password' => 'Info2015',
            'port' => '25',
            //'encryption' => 'tls',
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
        'db' => require(__DIR__ . '/db.php'),
        'db2' => require(__DIR__ . '/db2.php'),
        'db3' => require(__DIR__ . '/db3.php'),
    ],
        'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout'=>'admin',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
