<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
	'language' => 'ru-RU',

    'defaultRoute'=>'usertest/index',
    'bootstrap' => ['log',
	'app\components\Myboot',
	],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
		'@dir'=>dirname(__DIR__),
    ],
	'modules'=>[
	'vadim'=>[
	 'class' => 'app\modules\vadim\MyModule',
	// 'layout'=>'post',

	],
	],
    'components' => [
	
        /*'assetManager' => [
            'bundles' => [
                'app\assets\AppAsset' => [
                    'baseUrl' => 'http://some.cdn.com/files/i18n/en' // makes NO effect!
                ],
               
            ],
        ],*/
    
	   'comvad'=>[
	       'class'=>'app\components\Comvad',
           'prop1'=>['234','eeee'],
       ],
	
	   'mycom'=>[
	   'class'=>'app\components\MycomController',
	   'on evo'=>function($e) {
		   //debug($e);
		   $e->sender->name='eventtttt';
		   
	   }
	   ],
	
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '123',
			'baseUrl'=>'',
			
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


        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login/index'=>'login/index',

                'login/<title:\w+>/page/<page>'=>'login/part',
                'login/<title:>'=>'login/part',
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
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
         'allowedIPs' => ['*']
    ];
}

return $config;
