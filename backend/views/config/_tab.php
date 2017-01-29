<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<ul class="nav nav-tabs">
    <li class="active">
        <a href="<?=\yii\helpers\Url::to(['config/webconf'])?>">站点配置</a>
    </li>
    <li class="">
        <a href="<?=\yii\helpers\Url::to(['config/ownconf'])?>">自定义配置</a>
    </li>
    <li class="">
        <a href="<?=\yii\helpers\Url::to(['config/otherconf'])?>">其他配置</a>
    </li>
    <li class="">
        <a href="<?=\yii\helpers\Url::to(['config/addconf'])?>">添加配置</a>
    </li>
</ul>

