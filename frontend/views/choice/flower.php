<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>

<!--内容开始-->
<!--==============================选择开始======================================-->
<div class="choice">
    <div class="center">
        <div class="app-choice">
            <h3>
                找到158件相关产品
            </h3>
            <div class="filter clear">
                <div class="filter-item fl">
                    按照材料：
                </div>
                <div class="filter-con fl">
                    <?=$this->render('_fmaterial')?>
                </div>
            </div>
            <div class="filter clear">
                <div class="filter-item fl">
                    按照颜色：
                </div>
                <div class="filter-con fl">
                    <?=$this->render('_color')?>
                </div>
            </div>
            <div class="filter clear">
                <div class="filter-item fl">
                    按照节日：
                </div>
                <div class="filter-con fl">
                    <?=$this->render('_holiday')?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================选择结束==================================-->

<!--==================================列表开始==================================-->
<div class="appbox">
    <div class="app-container center">
        <div class="box-title clear">
            <div class="app-left fl">
                <span>筛选展示：</span>
            </div>
            <div class="app-right fr">
                共<?=count($model)?>个商品
            </div>
        </div>
        <div class="box-con clear">
            <?= count($model)==0?'<h4 style="margin-left: 20px">暂时没有符合条件的商品......</h4>':'';?>

            <?php foreach ($model as $v):?>
                <div class="con-box fl">
                    <a href="<?=\yii\helpers\Url::to(['goods/view','id'=>$v['id']])?>" target="_blank">
                        <img src="<?=Yii::$app->params['CONFIG']['SITE_DOMINNAME'].$v['smimg2']?>" alt="">
                        <div class="con-btm">
                            <div class="name clear">
                                <p class="fl"><?=$v['title']?></p>
                                <p class="fr">NO.p<?=date('Ymd').$v['id']?></p>
                            </div>
                            <div class="price clear">
                                <p class="money fl">
                                    <big>￥<?=$v['shopprice']?></big>
                                </p>
                                <p class="purchase fr">
                                    <?=intval($v['salesnum'])+100?>人购买
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach;?>

            <?=\yii\widgets\LinkPager::widget([
                    'pagination'=>$pages,
                    'firstPageLabel' => '首页',
                    'lastPageLabel' => '尾页',
                    'options' => ['class' => 'page'],
            ])?>

        </div>
    </div>
</div>
<!--==================================列表结束==================================-->

<!--内容结束-->

