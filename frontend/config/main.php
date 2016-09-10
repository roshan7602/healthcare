<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => array('/user/login')
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
            'errorAction' => 'user/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'showScriptName' => true,
            'rules' => [
                'user/signup' => 'user/signup',
                'user/login' => 'user/login',
                'useraction/userview/<userid:\w+>' => 'useraction/userview',
                'useraction/category' => 'useraction/category',
                'healthzone/home' => 'healthzone/home',
                'healthzone/content' => 'healthzone/content',
                'healthzone/viewcontent' => 'healthzone/viewcontent',
                'healthzone/category' => 'healthzone/category',
                'doctor/home' => 'doctor/home',
                'doctor/doctorprofile' => 'doctor/doctorprofile',
            ],  
        ],
        
    ],
    'params' => $params,
    
];
