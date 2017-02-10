<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<!--==================================注册开始==================================-->
<div class="register">
    <div class="center">
        <div class="register-left">
            <div class="register-img">
                <img src="static/images/register.jpg">
            </div>
        </div>
        <div class="register-right fl">
            <div class="r-header">
                <span class="fl">没有账号？<strong>请注册</strong></span>
                <span class="fr">已经注册？<a href="<?=\yii\helpers\Url::to(['site/login'])?>" style="color: red">登录</a></span>
            </div>
            <?php $form=\yii\widgets\ActiveForm::begin([
                    'fieldConfig'=>[
                            'template'=>'<div class="r-item"><span>{label}：</span>{input}</div><div class="error">{error}</div>'
                    ]
            ]);?>

               <?= $form->field($model,'username')->textInput(['placeholder'=>'输入用户名']);?>
               <?= $form->field($model,'email')->textInput(['placeholder'=>'输入用户名']);?>
               <?= $form->field($model,'password')->passwordInput(['placeholder'=>'输入密码']);?>
               <?= $form->field($model,'repass')->passwordInput(['placeholder'=>'重复密码']);?>

                <?= $form->field($model, 'verify')->widget(\yii\captcha\Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-7">{input}</div><div class="col-lg-4">{image}</div></div>',
                    'imageOptions' => ['title' => '换一个', 'alt' => '验证码', 'style' => 'cursor:pointer;']
                ]); ?>
                <div class="re-sub">
                    <?=\yii\helpers\Html::submitButton('注册',['title'=>'注册'])?>
                </div>
            <?php \yii\widgets\ActiveForm::end();?>

        </div>
    </div>
</div>
<!--==================================注册结束==================================-->
