<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
?>

<div class="user">
    <div class="center">
        <div class="user-left">
            <dl>
                <dt><a href="javascript:void(0)" class="user-info">个人中心</a></dt>
                <dd><a href="<?=\yii\helpers\Url::to(['personal/index'])?>">基本信息</a></dd>
            </dl>
            <dl>
                <dt><a href="javascript:void(0)" class="user-orders">我的订单</a></dt>
                <dd class="cur"><a href="<?=\yii\helpers\Url::to(['personal/order'])?>">订单明细</a></dd>
            </dl>
            <dl>
                <dt><a href="javascript:void(0)" class="user-collect">我的足迹</a></dt>
                <dd><a href="<?=\yii\helpers\Url::to(['credit/list'])?>">积分获得</a></dd>
            </dl>
        </div>
        <div class="user-right">
            <div class="right-title">
                <span>订单详情</span>
            </div>
            <div class="user-content">

                <table>
                    <thead>
                    <th>订单金额</th>
                    <th>订单人</th>
                    <th>下单电话</th>
                    <th>下单时间</th>
                    <th>订单状态</th>
                    </thead>
                    <tbody>
                    <?php foreach ($model as $v):?>
                        <tr>
                            <td><?=$v['points']?></td>
                            <td><?=$v['content']?></td>
                            <td><?=date('Y-m-d H:i:s',$v['created_at'])?></td>
                            <td><?=date('Y-m-d H:i:s',$v['updated_at'])?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                <?= \yii\widgets\LinkPager::widget(['pagination'=>$pages])?>
            </div>
        </div>
    </div>
</div>
</div>
