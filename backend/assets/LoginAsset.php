<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\assets;

class LoginAsset extends \yii\web\AssetBundle{

    public $basePath = '@webroot';

    public $baseUrl  = '@web';

    public $css = [
        'static/css/style.css',
        'static/css/style-responsive.css',
    ];

    public $js = [
        'static/js/modernizr.min.js',
    ];
    public $depends = [];

}