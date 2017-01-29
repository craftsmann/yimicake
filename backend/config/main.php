<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' =>'ZH-cn',
    //配置默认路由
    'defaultRoute' => 'index',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\AdminUser',
            'enableAutoLogin' => true,
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
        'authManager' =>[
            'class' => 'yii\rbac\DbManager',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    //处理日志记录
    'on beforeRequest'=>function($event){
        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(),\yii\db\ActiveRecord::EVENT_AFTER_UPDATE,['common\helpers\OprateLog','record']);
        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(),\yii\db\ActiveRecord::EVENT_AFTER_INSERT,['common\helpers\OprateLog','record']);
        \yii\base\Event::on(\yii\db\BaseActiveRecord::className(),\yii\db\ActiveRecord::EVENT_AFTER_DELETE,['common\helpers\OprateLog','record']);
    },
    'params' => $params,
];
