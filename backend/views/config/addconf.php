<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$css = '.help-block{color:red}';
$this->registerCss($css);
$js ='
   $("#sub-btn").on("click",function(ev){
      ev.preventDefault();
      $.ajax({
        type:"post",
        url :"'.Url::to(['config/addconf']).'",
        data: $("#sub-form").serialize(),
        success:function(data){
              var obj = eval("("+data+")");
              if(obj.status=="success"){
                layer.alert(obj.msg, {title:"提示信息",icon: 1},function(){
                   parent.location.reload(); // 父页面刷新
                   var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                   parent.layer.close(index);
                });
              }else{
                layer.alert(obj.msg, {title:"提示信息",icon: 2});  
              }
            },
        error:function(data){
              var obj = eval("("+data+")");
              alert("请检查字段");
         }    
      });
   
   
   });
   $(".nav-tabs>li").eq(3).addClass("active").siblings().removeClass("active");
   ';

$this->registerJS($js,\yii\web\View::POS_END);

?>
<div class="page-heading">
    <h4>添加配置</h4>
    <ul class="breadcrumb">
        <li>
            <span class="fa fa-home" aria-hidden="true"></span>
            <a href="<?=Url::to(['index/index'])?>">首页</a>
        </li>
        <li>
            <a href="<?=Url::to(['webconf'])?>">配置管理</a>
        </li>
        <li class="active">添加配置</li>
    </ul>
</div>
<div class="wrapper">
    <div class="col-lg-12">
        <section class="panel">
            <a id="conf-ad" style="display: none" class="btn btn-warning" href="">新增配置</a>
            <header class="panel-heading custom-tab">
                <?= $this->render("_tab");?>
            </header>
            <div class="panel-body"  style="margin-top: 20px">
             <?php echo Html::beginForm(['config/addconf'],'post',['class'=>'form-horizontal','id'=>'sub-form'])?>

            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">名称</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="ConfForm[name]" placeholder="例如：SITE_DESCRIPTION">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">赋值</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="ConfForm[value]" placeholder="例如：蛋糕售卖">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">描述</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="ConfForm[description]" placeholder="例如：关键词设置">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">描述</label>
                <div class="col-lg-10">
                    <select class="form-control" name="ConfForm[type]">
                        <option value="1">站点配置</option>
                        <option value="2">自定义配置</option>
                        <option value="3">其他配置</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10 pull-right">
                    <button id="sub-btn" type="submit" class="btn btn-success btn-block">添加</button>
                </div>
            </div>
               <?=Html::endForm();?>
            </div>
        </section>
    </div>
</div>