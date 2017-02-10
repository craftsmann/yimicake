<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<!--==================================登录开始==================================-->
<div class="register">
    <div class="center">
        <div class="register-left">
            <div class="register-img">
                <img src="static/images/register.jpg">
            </div>
        </div>
        <div class="register-right fl" style="margin-top: 60px">
            <div class="r-header">
                <span class="fl">已有账号？<strong>请登录</strong></span>
                <span class="fr">未注册？<a href="<?=\yii\helpers\Url::to(['site/signup'])?>" style="color: red">注册</a></span>
            </div>
            <?php $form = \yii\widgets\ActiveForm::begin([
                    'fieldConfig'=>[
                           'template'=>'<div class="r-item"><span>{label}</span>{input}</div><div class="error">{error}</divc>'
                    ]
            ]);?>
                <?= $form->field($model,'username')->textInput();?>
                <?= $form->field($model,'password')->passwordInput();?>
                <div class="re-sub">
                    <?=\yii\helpers\Html::submitButton('提交',['placeHolder'=>'提交'])?>
                </div>
        </div>
            <?php \yii\widgets\ActiveForm::end();?>

        </div>
    </div>
</div>
<!--==================================登录结束==================================-->
