<?php

use yii\di\Instance;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log', \backend\config\PreConfig::class],
    'language'=>'ru-RU',
    'modules' => [
        'profiles' => [
            'class' => 'backend\modules\profiles\Module',
        ],
    ],
    'container'=>[
        'singletons'=>[
            \backend\modules\profiles\services\contracts\ProfileStorage::class=>[
                ['class'=>\backend\modules\profiles\infrastructure\ProfileStorageMysql::class],
                [Instance::of('db_conn')]
                ],
            'db_conn'=>function(){

                return Yii::$app->db;
            },
            \backend\modules\profiles\services\contracts\ProfileService::class=>['class'=>\backend\modules\profiles\services\ProfileService::class]
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers'=>[
                'application/json'=>\yii\web\JsonParser::class
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
//            'enableSession' => false,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'profile/<action>'=>'profiles/profile/<action>',
                ['class'=>\yii\rest\UrlRule::class,'controller'=>'activity',
                'pluralize'=>false]
            ],
        ],

    ],
    'params' => $params,
];
