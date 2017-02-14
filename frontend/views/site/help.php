<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<!--================================个人中心开始==================================-->

<div class="user">
    <div class="center">

        <div class="user-left">
            <dl>
                <dd><a href="<?=\yii\helpers\Url::to(['site/help','item'=>'logistics'])?>">物流配送</a></dd>
            </dl>
            <dl>
                <dd><a href="<?=\yii\helpers\Url::to(['site/help','item'=>'payway'])?>">付款方式</a></dd>
            </dl>
            <dl>
                <dd><a href="<?=\yii\helpers\Url::to(['site/help','item'=>'register'])?>">会员注册</a></dd>
            </dl>
            <dl>
                <dd><a href="<?=\yii\helpers\Url::to(['site/help','item'=>'later'])?>">售后服务</a></dd>
            </dl>
        </div>
        <div class="user-right">

            <div class="user-content">
                <div class="user-form" style="width: 100%">
                    <?=$model['content']?>
                </div>
                </div>
        </div>
    </div>
</div>


<!--================================个人中心结束==================================-->

