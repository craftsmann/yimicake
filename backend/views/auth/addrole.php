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
        url :"'.Url::to(['auth/addrole']).'",
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
                alert("添加失败，请检查字段");  
              }
            },
        error:function(data){
              alert("请检查字段");
         }    
      });
      
   
   });
   ';

$this->registerJS($js,\yii\web\View::POS_END);

?>
<?php $this->beginPage();?>

    <!Doctype html>
    <html lang="<?= Yii::$app->language ?>">

    <head>

        <meta charset="<?= Yii::$app->charset ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <meta name="description" content="伊米蛋糕管理后台">

        <?= Html::csrfMetaTags();?>

        <?= Html::encode($this->title);?>

        <?= $this->head();?>

    </head>

    <?php $this->beginBody();?>

    <body class="sticky-header" style="background:#fff;">
    <section class="panel">
        <div class="panel-body">
            <?php echo Html::beginForm(['auth/addrole'],'post',['class'=>'form-horizontal','id'=>'sub-form'])?>

            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">名称</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="RoleForm[name]" placeholder="角色名称,例如：管理员">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">描述</label>
                <div class="col-lg-10">
                    <textarea class="form-control" name="RoleForm[description]" placeholder="角色描述，例如：负责管理后台用户"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10 pull-right">
                    <button id="sub-btn" type="submit" class="btn btn-primary">添加</button>
                </div>
            </div>
            <?php Html::endForm();?>
        </div>
    </section>
    </body>
    <?php $this->endBody();?>
    </html>
<?php $this->endPage();?>