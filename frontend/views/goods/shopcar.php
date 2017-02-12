<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
\frontend\assets\AppAsset::addScript($this,'@web/static/js/obj_showcar.js');
?>
<div class="center">
   <div class="shopcart" id="r-shopcart">
       <div class="breadbox">
           <a href="<?=Yii::$app->homeUrl?>">首页</a>&nbsp;&nbsp;&gt;
           <span class="shop-cur">购物车</span>
       </div>
    <table>
        <thead>
               <th>图片</th>
               <th>名称</th>
               <th>单价</th>
               <th>数量</th>
               <th>小计</th>
               <th>操作</th>
        </thead>
        <tbody>
              <?=$this->render('_shop',['model'=>$model]);?>
        </tbody>
    </table>
       <div class="total-cart">
            <div class="total-left">
                <a class="g_clearall" data-id="2" data-link="<?=Url::to(['goods/clear','type'=>'all'])?>" title="全部清空" style="cursor: pointer">全部清空</a>
            </div>
            <div class="total-right">
                <span>
                    合计：<strong class="g_price">0</strong>
                </span>
                <a class="t-paynow" data-user="<?=!Yii::$app->user->isGuest?1:0;?>" href="<?=Url::to(['order/list'])?>" title="去结算" target="_blank">去结算</a>
            </div>
       </div>
</div>
</div>

<?php
 $js = '$("#r-shopcart").Showcar()';
 $this->registerJs($js,\yii\web\View::POS_END);
?>