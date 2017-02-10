<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
$this->registerJsFile('@web/static/js/obj_goods.js',[\frontend\assets\AppAsset::className(),'depends'=>'frontend\assets\AppAsset']);
$this->registerJsFile('@web/static/js/detail.js',[\frontend\assets\AppAsset::className(),'depends'=>'frontend\assets\AppAsset']);
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
            <div class="img-box">
                <img style="width: 450px;height: 450px" src="<?='http://localhost/yimicake/frontend/web/'.$v['smimg1']?>">
            </div>
            <div class="s-bot">
                <ul>
                    <li style="cursor: pointer" class="s-cur">
                        <img src="<?='http://localhost/yimicake/frontend/web/'.$v['smimg1']?>">
                    </li>
                    <li style="cursor: pointer">
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
                <p><?=$v['detail']?></p>
            </div>
            <div class="s-detail">
                <span class="fl">包装:</span>
                <p><?=$v['package']?></p>
            </div>
            <div class="s-detail">
                <span class="fl">寄语:</span>
                <p><?=$v['words']?></p>
            </div>
            <div class="s-detail">
                <span class="fl">数量:</span>
                <p>
                    <div class="s-num">
                       <input class="s-reduce" type="button" value="-" style="cursor: pointer"><input id="s-num" index="<?=$v['id']?>" style="width: 30px;text-align: center" type="text" value="1" readonly><input class="s-add" type="button" value="+" style="cursor: pointer">
                    </div>
                </p>
            </div>

            <div class="s-detail clear" style="margin-top: 40px">
                <a class="btn btn-cart fr">立即购买</a>
                <a id="s-car" class="btn btn-pay fr" style="margin-right: 20px" title="加入购物车^_^" href="<?=Url::to(['goods/addcar'])?>">加入购物车</a>
            </div>
        </div>
    </div>

    <div class="shopcomment clear">
        <div class="comment-left fl">
            <h3>热卖排行</h3>
        </div>
        <div class="comment-right fl">
            <div class="shoptitle">
                <a href="javascript:;" data-item="0" class="c-cur" style="cursor: pointer">商品详情</a>
                <a href="javascript:;" data-item="1" style="cursor: pointer">累计评论</a>
                <a href="javascript:;" data-item="2" style="cursor: pointer">添加评论</a>
            </div>
            <div class="sh-box">
                <div class="shop-con">
                    <?=$v['con']['content']?>
                </div>
    <?php endforeach;?>
                <div class="shop-con" style="display: none">
                    <?php if(!isset($comments)):?>
                            <?='<h2>该商品暂无评论</h2>'?>
                        <?php else:?>

                        <?php foreach ($comments as $c):?>
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
                                        <?=$c['comments']?>
                                    </p>
                                    <p class="pl-site">
                                    <div class="pl-ip fr">124.45.12.2</div>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <?=\yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]);?>
                    <?php endif;?>

                    <div class="user-content" style="margin-left:103px">
                        <div class="user-form">
                            <form>

                            </form>
                        </div>
                    </div>
                </div>

                <div class="shop-con" style="display: none">
                      <h4>注意：评论不会立即发布，通过审核会发布.</h4>
                      <?php $form=\yii\widgets\ActiveForm::begin([
                              'action' => ['comments/accept'],
                              'options' => ['class'=>'com-form'],
                              'fieldConfig' => [
                                      'template'=>'{input}{error}'
                              ]
                      ]);?>
                      <?= $form->field($data,'goods_id')->hiddenInput(['value'=>$goods_id]);?>
                      <?= $form->field($data,'content')->widget('kucha\ueditor\UEditor',[
                          'clientOptions' => [
                              'initialFrameHeight' => '200',
                              'wordCount'=>'true',
                              'elementPathEnabled'=>'false',
                              'maximumWords'=>'400',
                              //定制菜单
                              'toolbars' => [
                                  [
                                      'fullscreen', 'undo', 'redo', '|',
                                      'bold', 'italic','removeformat',
                                  ],
                              ]
                          ]
                      ]);?>
                        <div class="re-sub" style="margin-top: 20px" title="发布">
                            <input type="button" value="发布" class="com-sub">
                        </div>
                      <?php $form=\yii\widgets\ActiveForm::end();?>

                </div>

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

