<?php
use backend\assets\LoginAsset;
use yii\helpers\Html;
$css = '.error{color:red;}';
LoginAsset::register($this);
$this->registerCss($css);
?>
<?php $this->beginPage();?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <?= Html::csrfMetaTags();?>
    <?= $this->head();?>
</head>
<?php $this->beginBody();?>

<body class="login-body">
<div class="container">

    <?= Html::beginForm(['site/login'],'post',['class'=>'form-signin']);?>
<!--    <form class="form-signin" action="">-->

        <div class="form-signin-heading text-center">
            <h1 class="sign-title">伊米后台登陆</h1>
            <img src="static/images/login-logo.png" alt=""/>
        </div>

        <div class="login-wrap">
            <?= Html::error($model,'user',['class'=>'error'])?>
            <input type="text" name="LoginForm[user]" class="form-control" placeholder="用户名/邮箱" autofocus>
            <?= Html::error($model,'pass',['class'=>'error'])?>
            <input type="password" name="LoginForm[pass]" class="form-control" placeholder="密码">
            <?=Html::error($model,'verify',['class'=>'error'])?>
            <?=\yii\captcha\Captcha::widget(['name'=>"LoginForm[verify]",'template'=>'{input}{image}',])?>
            <label class="checkbox">
                <input type="checkbox" name="LoginForm[remember]" value="remember">记住我
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>
        </div>

<!--       </form>-->
     <?=Html::endForm();?>

</div>
</body>

<?php $this->endBody();?>
</html>
<?php $this->endPage();?>
