<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
       'static/css/style.css',
       'static/css/style-responsive.css',
    ];

    public $js = [
        'static/js/jquery-ui-1.9.2.custom.min.js',
        'static/js/jquery-migrate-1.2.1.min.js',
        'static/js/bootstrap.min.js',
        'static/js/modernizr.min.js',
        'static/js/jquery.nicescroll.js',
        'static/plugin/layer/layer.js',
        'static/js/scripts.js',
        'static/js/app.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

    //注册js文件
    public static function addScript($view,$js){
        $view->registerJsFile($js,[AppAsset::className(),'depends'=>'backend\assets\AppAsset']);
    }
    //注册css文件
    public static function addCss($view,$css){
        $view->registerCssFile($css,[AppAsset::className(),'depends'=>'backend\assets\AppAsset']);
    }
}
