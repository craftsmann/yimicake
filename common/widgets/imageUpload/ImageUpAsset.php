<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace common\widgets\imageUpload;
use yii\web\AssetBundle;

//图片上传
class ImageUpAsset extends AssetBundle{


    public $css = [
        'css/webuploader.css',
    ];
    public $js  = [
        'js/webuploader.js',
    ];
    public $depends=[
        'backend\assets\AppAsset'
    ];
    public function init()
    {
        $this->sourcePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'static';
    }
}