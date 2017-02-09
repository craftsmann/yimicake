<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$value = \common\models\Value::find()->joinWith('catename b')->where(['b.name'=>'蛋糕'])->asArray()->limit('4')->orderBy([\common\models\Value::tableName().'.id'=>SORT_DESC])->asArray()->all();
?>

<?php $this->beginPage();?>
<!Doctype html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <meta name="description" content="伊米蛋糕店">

    <title>伊米蛋糕网</title>

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
                <a href="<?=Url::to(['site/login'])?>">登录</a>
                <a href="<?=Url::to(['site/signup'])?>">注册</a>
            <?php endif;?>
            <a href="<?=Yii::$app->user->isGuest?Url::to(['site/login']):Url::to(['personal/index'])?>">我的账户</a>
            <a href="">付款方式</a>
            <a href="">物流配送</a>
            <a href="">常见问题</a>
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
                <a href="<?=Url::to(['goods/shopcar'])?>" target="_blank"><span class="s-car" title="共件<?=$this->render('_car')?>商品，请点击查看">我的购物车</span></a>
                <a href="<?=Url::to(['goods/shopcar'])?>" class="s-car-num" target="_blank"><?=$this->render('_car')?></a>
            </div>
        </div>
    </div>

</div>
<!--================================导航==================================-->
<div class="nav">
    <div class="center">
        <div class="nav-left fl">
            <a href="#" style="color: #fff;background: #f95d50;display: inline-block;width: 230px">全部商品分类</a>
            <div class="category">
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
            <li><a href="<?=\yii\helpers\Url::to(['choice/cake','war'=>'','obj'=>'','mat'=>'','des'=>''])?>" title="蛋糕">蛋糕</a></li>
            <li><a href="<?=\yii\helpers\Url::to(['choice/flower','war'=>'','obj'=>'','color'=>'','mat'=>'','des'=>'','hol'=>''])?>" target="_blank" title="鲜花">鲜花</a></li>
            <?php foreach ($value as $v):?>
                <li><a href="<?=\yii\helpers\Url::to(['choice/cake','war'=>$v['id'],'obj'=>'','mat'=>'','des'=>''])?>" target="_blank" title="<?=$v['vname'].'蛋糕'?>"><?=$v['vname'].'蛋糕'?></a></li>
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
    <ul>
        <li class="s-service">
            <a href="http://wpa.qq.com/msgrd?v=3&uin=1791502202&site=qq&menu=yes" title="在线客服">在线客服</a>
            <i></i>
        </li>
        <li class="s-user">
            <a href="#" title="个人中心">个人中心</a>
            <i></i>
        </li>
        <li class="s-cart">
            <a href="#" title="购物车">购物车</a>
            <i></i>
        </li>
        <li class="s-top">
            <a class="totop" href="javascript:;" title="返回顶部">返回顶部</a>
            <i></i>
        </li>
    </ul>
</div>
<!--侧边结束-->

<!--底部开始-->
<div class="footer">
    <div class="center">
        <dl class="f-link">
            <dt>购物指南</dt>
            <dd>
                <a href="#">购物流程</a>
            </dd>
            <dd>
                <a href="#">会员详情</a>
            </dd>
            <dd>
                <a href="#">联系客服</a>
            </dd>
        </dl>
        <dl class="f-link">
            <dt>购物指南</dt>
            <dd>
                <a href="#">购物流程</a>
            </dd>
            <dd>
                <a href="#">会员详情</a>
            </dd>
            <dd>
                <a href="#">联系客服</a>
            </dd>
        </dl>
        <dl class="f-link">
            <dt>购物指南</dt>
            <dd>
                <a href="#">购物流程</a>
            </dd>
            <dd>
                <a href="#">会员详情</a>
            </dd>
            <dd>
                <a href="#">联系客服</a>
            </dd>
        </dl>
        <dl class="f-link">
            <dt>购物指南</dt>
            <dd>
                <a href="#">购物流程</a>
            </dd>
            <dd>
                <a href="#">会员详情</a>
            </dd>
            <dd>
                <a href="#">联系客服</a>
            </dd>
        </dl>
        <dl class="f-link">
            <dt>购物指南</dt>
            <dd>
                <a href="#">购物流程</a>
            </dd>
            <dd>
                <a href="#">会员详情</a>
            </dd>
            <dd>
                <a href="#">联系客服</a>
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
    甘肃ICP备060194 | yiiframework All Rights Reserved
    <a target="_blank" href="#">关于我们</a>
    <a target="_blank" href="#">联系我们</a>

</div>

</body>
<?php $this->endBody();?>
</html>
<?php $this->endPage();?>
