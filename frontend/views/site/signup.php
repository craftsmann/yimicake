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
            <form action="" method="post">
                <div class="r-header">
                    <span class="fl">没有账号？请注册</span>
                    <span class="fr">已经注册？<a href="<?=\yii\helpers\Url::to(['site/login'])?>" style="color: red">登录</a></span>
                </div>
                <div class="r-item">
                    <span>账户:</span>
                    <input type="text" name="username" placeholder="输入用户名">
                </div>

                <div class="r-item">
                    <span>邮箱:</span>
                    <input type="text" name="username" placeholder="请输入邮箱">
                </div>

                <div class="r-item">
                    <span>密码:</span>
                    <input type="text" name="username" placeholder="请输入密码">
                </div>
                <div class="r-item">
                    <span>重复密码:</span>
                    <input type="text" name="username" placeholder="请重复输入密码">
                </div>
                <div class="r-item">
                    <span>验证码:</span>
                    <input type="text" name="username" placeholder="请输入验证码">
                </div>
                <div class="re-sub">
                    <input type="button" value="注册">
                </div>
            </form>

        </div>
    </div>
</div>
<!--==================================注册结束==================================-->
