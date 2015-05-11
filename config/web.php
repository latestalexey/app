<?php

$params = require(__DIR__ . '/params.php');

$config = [
    //  'homeUrl' => '/app',
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            'baseUrl' => '/app',
            //       'baseUrl' => '/app',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'fyH4_gsoL7Pazmnn72qogbPqewx-EiV1',
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
        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
//            'rules' => [
//                '' => 'site/index',
//                '<action>' => 'site/<action>',
//            ],
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets'
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
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ]
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'top-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
        ],
       
        'asset' => [
            'class' => 'app\modules\asset\Asset',
        ],
        'b2b' => [
            'class' => 'app\modules\b2b\b2b',
        ],
       'armada' => [
            'class' => 'app\modules\armada\master',
        ],

        'dynagrid' => [
            'class' => '\kartik\dynagrid\Module',
        // other settings (refer documentation)
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module',
        // other module settings
        ],
    ],
    'aliases' => [
        '@mdm/admin' => '@vendor/mdmsoft/yii2-admin',
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //    'admin/*',  // ::: IMPORTANT :::: Make it disable after configuring the USER Roles/Permissions

           // 'site/index',
          //  'site/about',
           // 'site/contact',
            'site/signup',
          //  'site/logout',
            'site/login'
        ]
    ],
    'params' => $params,
//    'formatter' => [
//    'class' => 'yii\i18n\Formatter',
//    'dateFormat' => 'php:d-M-Y',
//    'datetimeFormat' => 'php:d-M-Y H:i:s',
//    'timeFormat' => 'php:H:i:s',
//]
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';
//     $config['modules']['debug'] = 'hscstudio\heart\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
      
    
 //   $config['modules']['gii'] = 'hscstudio\heart\Module';
    
}

return $config;
