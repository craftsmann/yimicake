<?php
/**
 * @see    https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 * @api    参考http://fex.baidu.com/webuploader/doc/index.html配置
 */
namespace common\widgets\imageUpMore;

return [

    //swf文件路径
    'swf'=> \Yii::getAlias('@common').'widgets/imageUpload/static/js/Uploader.swf',

    // 只允许选择文件，可选。
    'accept'=>[
        'title'=>'Images',
        'extensions'=> 'gif,jpg,jpeg,bmp,png',
        'mimeTypes'=>'image/*',
    ],

    // 不压缩image,默认如果是jpeg,文件上传前会压缩一把再上传!
    'resize'=>false,

    //设置默认加载方式为flash
    //'runtimeOrder'=>'flash'

    //设置默认的数量
    'fileNumLimit'=>1,

    //设置总共的大小
    //'fileSizeLimit'=>10000

    //设置单个大小
    'fileSingleSizeLimit'=>1000000,

    //选择按钮
    'pick'=>[
        'id'=>'#filePicker',
    ],

    //设置上传的input的name
    'fileVal'=>'file',
];
?>
