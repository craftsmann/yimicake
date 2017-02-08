<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$css = '.form-group{margin-bottom:0} .help-block{color:red}';
$this->registerCss($css);
AppAsset::addScript($this,'@web/static/plugin/layer/layer.js');
$js ='
   $("#sub-btn").on("click",function(ev){
      ev.preventDefault();
      $.ajax({
        type:"post",
        url :"'.Url::to(['user/set']).'",
        data: $("#sub-form").serialize(),
        success:function(data){
              var obj = eval("("+data+")");
              if(obj.status=="success"){
                layer.alert(obj.msg, {icon: 1,time:1000,});
              }else{
                layer.alert(obj.msg, {icon: 2,time:1000,});
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
            <?php echo Html::beginForm(['user/set'],'post',['class'=>'form-horizontal','id'=>'sub-form'])?>

<!--            <form class="form-horizontal" role="form">-->
                <input id="f-photo" type="hidden" name="UserForm[photo]" value="<?=Yii::$app->user->identity->photo?>">
                <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">用户名</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" value="<?=Yii::$app->user->identity->username?>" name="UserForm[username]" placeholder="用户名">

                        <?= Html::error($model,'username',['class'=>'help-block'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email" class="form-control" name="UserForm[email]" value="<?=Yii::$app->user->identity->email?>" placeholder="Email" readonly="readonly" title="email值已经绑定，无法修改">
                        <?= Html::error($model,'email',['class'=>'help-block'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPhone" class="col-lg-2 col-sm-2 control-label">手机号码</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="UserForm[phone]" value="<?=Yii::$app->user->identity->phone?>">
                        <?= Html::error($model,'phone',['class'=>'help-block'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPhone" class="col-lg-2 col-sm-2 control-label">QQ号码</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" name="UserForm[qq]" value="<?=Yii::$app->user->identity->qq?>">
                        <?= Html::error($model,'qq',['class'=>'help-block'])?>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">性别</label>
                    <div class="col-lg-10">
                        <div>
                            <label>
                                <input type="radio" name="UserForm[sex]" value="男"
                                    <?= Yii::$app->user->identity->sex == '男'? 'checked="checked"':''?>
                                ><span>男</span>
                                <input type="radio" name="UserForm[sex]" value="女" style="margin-left: 20px"
                                    <?= Yii::$app->user->identity->sex == '女'? 'checked="checked"':''?>
                                >女
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
                        <button id="sub-btn" type="submit" class="btn btn-primary">更新</button>
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