<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$css = '.form-group{margin-bottom:0} .help-block{color:red}';
$this->registerCss($css);
AppAsset::addScript($this,'@web/static/plugin/layer/layer.js');
$js ='
   $("#user-btn").on("click",function(ev){
      ev.preventDefault();
      $.ajax({
        type:"post",
        url :"'.Url::to(['fuser/add']).'",
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
                layer.alert(obj.msg, {icon: 2,time:2000,});
              }
            },
        error:function(){
              alert("提交表单出错!!!");
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
            <?php echo Html::beginForm(['Fuser/add'],'post',['class'=>'form-horizontal','id'=>'sub-form'])?>

            <!--            <form class="form-horizontal" role="form">-->
            <input id="f-photo" type="hidden" name="FuserForm[photo]">
            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">用户名</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="FuserForm[username]" placeholder="用户名">

                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">密码</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" name="FuserForm[password]" placeholder="密码">

                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" name="FuserForm[email]"  placeholder="Email">

                </div>
            </div>
            <div class="form-group">
                <label for="inputPhone" class="col-lg-2 col-sm-2 control-label">手机号码</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="FuserForm[phone]">

                </div>
            </div>
            <div class="form-group">
                <label for="inputPhone" class="col-lg-2 col-sm-2 control-label">QQ号码</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="FuserForm[qq]">

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">状态</label>
                <div class="col-lg-10">
                    <div>
                        <label>
                            <select name="FuserForm[status]" style="width: 100%">
                                <option value="10">激活</option>
                                <option value="0">锁定</option>
                            </select>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">性别</label>
                <div class="col-lg-10">
                    <div>
                        <label>
                            <input type="radio" name="FuserForm[sex]" value="男">
                            <span>男</span>
                            <input type="radio" name="FuserForm[sex]" value="女">
                            女
                        </label>
                    </div>
                </div>
            </div>

            <?= \common\widgets\imageUpload\WebUpload::widget([
                'init'=>[
                    'pick'=>[
                        'id'=>'#filePicker',
                        'label'=>'头像上传'
                    ],
                    'auto'=>true,
                    'resize'=>false,
                    'fileVal'=>'UploadForm[imageFile]',
                    //设置接收处理上传的url;
                    'server'=>\yii\helpers\Url::to(['upload/loadsingle']),
                ],
                'inval' =>[
                    'id'=>'#f-photo'
                ],
            ])?>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10 pull-right">
                    <button id="user-btn" type="submit" class="btn btn-primary">添加</button>
                </div>
            </div>
            <!--            </form>-->
            <?php Html::endForm();?>
        </div>
    </section>
    </body>
    <?php $this->endBody();?>
    </html>
<?php $this->endPage();?>