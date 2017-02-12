<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl  = '@web';
    public $css = [
        'static/css/reset.css',
        'static/css/main.css',
        'static/css/app.css',
    ];
    public $js = [
        'static/js/objFade.js',
        'static/js/app.js',
        'static/plugin/DatePicker/WdatePicker.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
    public static function addScript($view,$js){
        return $view->registerJSFile($js,[AppAsset::className(),'depends'=>'frontend\assets\AppAsset'],View::POS_END);
    }
}
