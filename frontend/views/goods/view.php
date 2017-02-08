<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
\frontend\assets\AppAsset::addScript($this,'@web/static/js/obj_goods.js');
?>

<!--内容开始-->
<div class="center">
<?php foreach ($res as $v):?>

    <div class="breadbox">
        <a href="<?=Yii::$app->homeUrl?>">首页</a>&nbsp;&nbsp;>
        <a href=""><?=$v['cate']['name']?></a>&nbsp;&nbsp;>
        <span class="shop-cur"><?=$v['title']?></span>
    </div>

    <div class="shop-box clear">
        <div class="shop-left fl">
            <img style="width: 450px;height: 450px" src="<?='http://localhost/yimicake/frontend/web/'.$v['smimg1']?>">
            <div class="s-bot">
                <ul>
                    <li>
                        <img src="<?='http://localhost/yimicake/frontend/web/'.$v['smimg1']?>">
                    </li>
                    <li>
                        <img src="<?='http://localhost/yimicake/frontend/web/'.$v['smimg2']?>">
                    </li>
                </ul>
            </div>
        </div>
        <div class="shop-right fl">
            <h3>
                <strong><?=$v['title']?></strong>
            </h3>
            <div class="s-price" style="background: url(static/images/price_bg.png) no-repeat;color: #fff;">
                ￥<?=$v['shopprice']?>
            </div>
            <div class="s-detail">
                <span class="fl">材料:</span>
                <p><?=$v['material']?></p>
            </div>
            <div class="s-detail">
                <span class="fl">包装:</span>
                <p><?=$v['detail']?></p>
            </div>
            <div class="s-detail">
                <span class="fl">寄语:</span>
                <p><?=$v['words']?></p>
            </div>
            <div class="s-detail">
                <span class="fl">数量:</span>
                <p>
                    <div class="s-num">
                       <input class="s-reduce" type="button" value="-"><input id="s-num" index="<?=$v['id']?>" style="width: 30px;text-align: center" type="text" value="1" readonly><input class="s-add" type="button" value="+">
                    </div>
                </p>
            </div>

            <div class="s-detail clear" style="margin-top: 40px">
                <a class="btn btn-cart fr">立即购买</a>
                <a id="s-car" class="btn btn-pay fr" style="margin-right: 20px" title="加入购物车^_^" href="<?=Url::to(['goods/addcar'])?>">购物车</a>
            </div>
        </div>
    </div>
<?php endforeach;?>
    <div class="shopcomment clear">
        <div class="comment-left fl">
            <h3>热卖排行</h3>
        </div>
        <div class="comment-right fl">
            <div class="shoptitle">
                <a href="#" class="c-cur">商品详情</a>
                <a href="#">累计评论</a>
            </div>
            <div class="shop-con">
                <div class="pl-box clear">
                    <div class="pl-left fl">
                        <img src="static/images/avator.jpg" alt="">
                        <p>12445113</p>
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                    </div>
                    <div class="pl-right fl">
                        <p>
                            七夕下午送到，和照片符合，满意,七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意
                            七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意
                        </p>
                        <p class="pl-site">
                            <div class="pl-ip fr">124.45.12.2</div>
                        </p>
                    </div>
                </div>
                <div class="pl-box clear">
                    <div class="pl-left fl">
                        <img src="static/images/avator.jpg" alt="">
                        <p>12445113</p>
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                    </div>
                    <div class="pl-right fl">
                        <p>
                            七夕下午送到，和照片符合，满意,七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意
                            七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意
                        </p>
                        <p class="pl-site">
                        <div class="pl-ip fr">124.45.12.2</div>
                        </p>
                    </div>
                </div>
                <div class="pl-box clear">
                    <div class="pl-left fl">
                        <img src="static/images/avator.jpg" alt="">
                        <p>12445113</p>
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                    </div>
                    <div class="pl-right fl">
                        <p>
                            七夕下午送到，和照片符合，满意,七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意
                            七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意
                        </p>
                        <p class="pl-site">
                        <div class="pl-ip fr">124.45.12.2</div>
                        </p>
                    </div>
                </div>
                <div class="pl-box clear">
                    <div class="pl-left fl">
                        <img src="static/images/avator.jpg" alt="">
                        <p>12445113</p>
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                        <img src="static/images/star.jpg">
                    </div>
                    <div class="pl-right fl">
                        <p>
                            七夕下午送到，和照片符合，满意,七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意
                            七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意七夕下午送到，和照片符合，满意
                        </p>
                        <p class="pl-site">
                        <div class="pl-ip fr">124.45.12.2</div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="user-content" style="margin-left:103px">
                <div class="user-form">
                    <form>
                        <div class="box_baseinfo">
                            <span>昵&nbsp;&nbsp;&nbsp;&nbsp;称:</span>
                            <input type="text" name="emial">
                        </div>
                        <div class="box_baseinfo">
                            <span>姓&nbsp;&nbsp;&nbsp;&nbsp;名:</span>
                            <input type="text" name="emial">
                        </div>
                        <div class="box_baseinfo">
                            <span>手&nbsp;&nbsp;&nbsp;&nbsp;机:</span>
                            <input type="text" name="emial">
                        </div>
                        <div class="box_baseinfo">
                            <span>性&nbsp;&nbsp;&nbsp;&nbsp;别:</span>
                            <select name="sex">
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select>
                        </div>
                        <div class="re-sub">
                            <input type="button" value="保存">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--内容结束-->

<?php
 $js = '$("#s-car").Shop()';
 $this->registerJs($js,\yii\web\View::POS_END);
?>

