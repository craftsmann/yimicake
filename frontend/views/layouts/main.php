<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$value = \common\models\Value::find()->joinWith('catename b')->where(['b.name'=>'蛋糕'])->asArray()->limit('4')->orderBy([\common\models\Value::tableName().'.id'=>SORT_DESC])->asArray()->all();
$conf   = \common\models\Conf::find()->asArray()->all();
Yii::$app->params['CONFIG']=\yii\helpers\ArrayHelper::map($conf,'name','value');
?>

<?php $this->beginPage();?>
<!Doctype html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <meta name="description" content="<?=Yii::$app->params['CONFIG']['SITE_DESCRIPTION']?>">

    <title><?=Yii::$app->params['CONFIG']['SITE_KEY_WORDS']?></title>

    <?= Html::csrfMetaTags();?>

    <?= $this->head();?>

</head>
<html lang="<?=Yii::$app->language?>">

<?php $this->beginBody();?>
<body>

<!--顶部-->
<div class="top">
    <div class="center clear">
        <div class="left fl">
            欢迎来到<a href="<?=Yii::$app->homeUrl?>">伊米蛋糕屋</a>
        </div>
        <div class="right fr">
            <?php if(Yii::$app->user->isGuest):?>
            <a href="<?=\yii\helpers\Url::to(['site/login'])?>">登录</a>
            <a href="<?=\yii\helpers\Url::to(['site/signup'])?>">注册</a>
                  <?php else:?>
                <a href="<?=Yii::$app->user->isGuest?Url::to(['site/login']):Url::to(['personal/index'])?>"><?=isset(Yii::$app->user->identity->username)?Yii::$app->user->identity->username:'我'?>的账户</a>
                  <a href="<?=Url::to(['site/logout'])?>">退出登录</a>
            <?php endif;?>
            <a href="<?=\yii\helpers\Url::to(['site/help','item'=>'logistics'])?>" target="_blank">物流配送</a>
            <a href="<?=\yii\helpers\Url::to(['site/help','item'=>'payway'])?>" target="_blank">付款方式</a>
            <a href="<?=Url::to(['site/help'])?>" target="_blank">帮助中心</a>
        </div>
    </div>
</div>
<!--================================头部===================================-->
<div class="header">
    <div class="center clear">
        <div class="left fl">
            <a href="#">
                <img src="static/images/logo.png" style="width: 200px">
            </a>
        </div>
        <div class="inner fl">
            <form action="" method="get">
                <div class="search clear">
                    <div class="search-left">
                        <input type="text" name="q" class="search-input">
                    </div>
                    <div class="search-right fl">
                        <button class="search-btn">搜索</button>
                    </div>
                    <div class="hot-words">
                        <p>
                            热门搜索:<?=$this->render('_hot')?>
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <div class="right fl">
            <div class="cart">
                <a href="<?=Url::to(['goods/shopcar'])?>">
                    <span class="s-car" title="共件<?=$this->render('_car')?>商品，请点击查看">我的购物车</span>
                </a>
                <a href="<?=Url::to(['goods/shopcar'])?>" class="s-car-num"><?=$this->render('_car')?></a>
            </div>
        </div>
    </div>

</div>
<!--================================导航==================================-->
<div class="nav">
    <div class="center">
        <div class="nav-left fl" style="height: 1px">
            <a href="#" style="color: #fff;background: #f95d50;display: inline-block;width: 230px">全部商品分类</a>
            <div class="category" style="display: none">
                <div class="part">
                    <b>蛋糕</b>
                    <ul>
                        <?=$this->render('_cake')?>
                    </ul>
                </div>
                <div class="part">
                    <b>鲜花</b>
                    <ul>
                        <?=$this->render('_flower')?>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav-inner fl">
            <li class="act"><a href="<?=Yii::$app->homeUrl?>">首页</a></li>
            <li><a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>'','material'=>'','design'=>'','object'=>'',])?>" target="_blank" title="蛋糕">蛋糕</a></li>
            <li><a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>'','material'=>'','holiday'=>'',])?>" target="_blank" title="鲜花">鲜花</a></li>
            <?php foreach ($value as $v):?>
                <li><a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>$v['id'],'material'=>'','design'=>'','object'=>'',])?>" target="_blank" title="<?=$v['vname'].'蛋糕'?>"><?=$v['vname'].'蛋糕'?></a></li>
            <?php endforeach;?>
        </ul>
        <div class="nav-right fr">
            客户至上  <span>|</span>  诚信是金
        </div>
    </div>
</div>



<?=$content?>

<!--侧边开始-->
<div class="sidebar" data-personal='{"oTop":500,"speed":100}' style="display: none;">
    <?=$this->render('_sidebar')?>
</div>
<!--侧边结束-->

<!--底部开始-->
<div class="footer">
    <div class="center">
        <dl class="f-link">
            <dt>购物指南</dt>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'register'])?>">购物流程</a>
            </dd>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'register'])?>">会员介绍</a>
            </dd>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'register'])?>">联系客服</a>
            </dd>
        </dl>
        <dl class="f-link">
            <dt>配送方式</dt>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'logistics'])?>">送货上门</a>
            </dd>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'logistics'])?>">门店自取</a>
            </dd>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'logistics'])?>">配送范围</a>
            </dd>
        </dl>
        <dl class="f-link">
            <dt>支付方式</dt>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'payway'])?>">在线支付</a>
            </dd>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'payway'])?>">银行汇款</a>
            </dd>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'payway'])?>">货到付款</a>
            </dd>
        </dl>
        <dl class="f-link">
            <dt>服务支持</dt>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'later'])?>">售后服务</a>
            </dd>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'later'])?>">退款说明</a>
            </dd>
            <dd>
                <a href="<?=Url::to(['site/help','item'=>'later'])?>">取消订单</a>
            </dd>
        </dl>
        <dl class="f-link">
            <dt>联系我们</dt>
            <dd>
                <a href="#">联系我们</a>
            </dd>
        </dl>
        <div class="connection">
            <p class="phone">400-658-1177</p>
            <p><span>周一至周日 24小时服务</span></p>
            <a href="#" class="btn">24小时在线客服</a>
        </div>
    </div>
</div>
<!--底部结束-->
<div class="copyright center">
    <?=Yii::$app->params['CONFIG']['SITE_NUMBER']?> | yimicake All Rights Reserved powered by <a href="http://www.yiiframework.com/" target="_blank">yiiframework</a>
    <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1791502202&site=qq&menu=yes">关于我们</a>
    <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1791502202&site=qq&menu=yes">联系我们</a>

</div>

</body>
<?php $this->endBody();?>
</html>
<?php $this->endPage();?>
