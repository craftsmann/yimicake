<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<!--==================================登录开始==================================-->
<div class="register" style="bottom: 0">
    <div class="center">
        <div class="register-left" style="height: 300px">
            <div class="register-img">
                <img src="static/images/register.jpg">
            </div>
        </div>
        <div class="register-right fl">
            <form action="" method="">
                <div class="r-header">

                    <span class="fl">已有账号？请登陆</span>
                    <span class="fr">未注册？<a href="<?=\yii\helpers\Url::to(['site/signup'])?>" style="color: red">注册</a></span>
                </div>
                <div class="r-item">
                    <span>账户:</span>
                    <input type="text" name="username" placeholder="输入用户名">
                </div>
                <div class="r-item">
                    <span>密码:</span>
                    <input type="text" name="username" placeholder="请输入邮箱">
                </div>
                <div class="re-sub">
                    <input type="button" value="登录">
                </div>
            </form>

        </div>
    </div>
</div>
<!--==================================登录结束==================================-->
