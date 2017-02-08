<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'modules' => [
        'redactor' => [
            'class' => 'yii\redactor\RedactorModule',
            'uploadDir' => '@frontend/web/uploads',
            'uploadUrl' => 'http://localhost/site/yimicake/frontend/web/uploads',
            'imageAllowExtensions'=>['jpg','png','gif']
        ],
    ],
    'components' => [
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
    ],
];
