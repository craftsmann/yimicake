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
        url :"'.Url::to(['menu/update']).'",
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
            <?php echo Html::beginForm(['menu/update'],'post',['class'=>'form-horizontal','id'=>'sub-form'])?>
            <input type="hidden" id="up-id" name="MenuForm[id]">
            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">名称</label>
                <div class="col-lg-10">
                    <input type="text" id="up-name" class="form-control" name="MenuForm[name]" placeholder="菜单名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">父级</label>
                <select id="select" name="MenuForm[pid]" class="form-control m-bot15" style="width:95%;margin-left: 12px">
                    <option value="0">---请选择父级----</option>
                    <?php foreach ($arr as $v):?>
                        <option  value="<?=$v['id']?>"><?=$v['format'].$v['name']?></option>
                    <?php endforeach;?>

                </select>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">路由</label>
                <div class="col-lg-10">
                    <input type="text" id="up-route" class="form-control" name="MenuForm[route]" placeholder="路由">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">排序</label>
                <div class="col-lg-10">
                    <input type="text" id="up-order" class="form-control" name="MenuForm[order]" placeholder="排序">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">icon</label>
                <div class="col-lg-10">
                    <input type="text" id="up-icon" class="form-control" name="MenuForm[data]" placeholder="icon名称">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10 pull-right">
                    <button id="sub-btn" type="submit" class="btn btn-primary">更新</button>
                </div>
            </div>
            <?php Html::endForm();?>
        </div>
    </section>
    </body>
    <?php $this->endBody();?>
    </html>
<?php $this->endPage();?>