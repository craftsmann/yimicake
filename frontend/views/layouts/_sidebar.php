<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
?>



<ul>
    <li class="s-service">
        <a href="http://wpa.qq.com/msgrd?v=3&uin=1791502202&site=qq&menu=yes" title="在线客服">在线客服</a>
        <i></i>
    </li>
    <li class="s-user">
        <a href="<?=Url::to(['personal/index'])?>" title="个人中心">个人中心</a>
        <i></i>
    </li>
    <li class="s-cart">
        <a href="<?=Url::to(['goods/shopcar'])?>" target="_blank" title="购物车">购物车</a>
        <i></i>
    </li>
    <li class="s-top">
        <a class="totop" href="javascript:;" title="返回顶部">返回顶部</a>
        <i></i>
    </li>
</ul>
