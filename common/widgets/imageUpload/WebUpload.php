<?php

/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace common\widgets\imageUpload;

use yii\helpers\ArrayHelper;
use yii\base\Exception;
use yii\base\Widget;
use yii\web\View;


class WebUpload extends Widget
{
    //初始化
    public $init = [];
    //隐藏域的val
    public $inval = [];

    public function init()
    {
        //关闭csrf验证
        //\Yii::$app->request->enableCsrfValidation = false;

        $conf  = require(__DIR__.'/conf.php');

        if(is_array($conf)){
            $this->init = ArrayHelper::merge($conf,$this->init);
        }else{
            throw new Exception('请检查配置文件');
        }


        parent::init();
    }

    public function run()
    {
        //注册静态文件
        $this->registerStatic();
        //展示视图
        return $this->render('uploadView',['conf'=>$this->init]);

    }


    protected function registerStatic(){

        ImageUpAsset::register($this->view);
        $clientConf = json_encode($this->init);
        $inval   = $this->inval;

        $js = '
        var $ = jQuery,
        $list = $("#filelist"),
        
        // 优化retina, 在retina下这个值是2
        ratio = window.devicePixelRatio || 1,

        // 缩略图大小
        thumbnailWidth = 180 * ratio,
        thumbnailHeight = 110 * ratio,
        // Web Uploader实例
        uploader;
        
        //添加按钮
        var $btn = $("#ctlBtn");     
        var uploader = WebUploader.create('.$clientConf.');
        
        // 当有文件添加进来的时候
        uploader.on("fileQueued", function( file ) {
        var $li = $(
                \'<div id="\' + file.id + \'" class="file-item thumbnail">\' +
                    \'<img>\' +
                    \'<div class="info">\' + file.name + \'</div>\' +
                \'</div>\'
                );
        var  $img = $li.find("img");
           
        $list.append( $li );
         
         
         // 创建缩略图
         uploader.makeThumb( file, function( error, src ) {
            if ( error ) {
                $img.replaceWith("<span>预览失败，请更换浏览器，例如：谷歌、火狐</span>");
                return;
            }
             $img.attr( "src", src );
         }, thumbnailWidth, thumbnailHeight );
        
         
         // 文件上传过程中创建进度条实时显示。  
         uploader.on( "uploadProgress", function( file, percentage ) {  
         var $li = $( "#"+file.id ), 
         //上传的数量 
         $percent = $li.find(".progress span");  
  
         // 避免重复创建  
         if ( !$percent.length ) {  
           $percent = $(\'<p class="progress"><span></span></p>\')  
                     .appendTo( $li )  
                     .find("span");  
         }
         $percent.css( "width", percentage * 100 + "%" );  
         
         });
       
        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on("uploadSuccess", function( file,response ) {
            $("'.$inval["id"].'").val(response.filePath+response.fileName);
            $(".up-info").html(response.msg);
            $(\'#\'+file.id ).addClass("upload-state-done");
        });
       
       // 文件上传失败，显示上传出错。  
       uploader.on( "uploadError", function( file ) {  
           var $li = $( \'#\'+file.id ),  
           $error = $li.find("div.error");  
           // 避免重复创建  
           if ( !$error.length ) {  
             $error = $(\'<div class="error"></div>\').appendTo( $li );  
           }  
           $error.text("上传失败");
       });
       
      
      //上传过程完成，成功或者失败，并删除进度条。  
      uploader.on("uploadComplete", function(file) {  
      //   $(\'#\'+file.id ).find(".progress").remove();  
      });   
      
      
      //点击上传事件;
      $btn.on("click", function() {  
        uploader.upload();  
      });  
       
   
    });
      ';
    $this->view->registerJs($js,View::POS_END);
    }

}