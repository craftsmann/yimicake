<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
\frontend\assets\AppAsset::addScript($this,'@web/static/js/obj_showcar.js');
?>
<!--================================订单开始==================================-->

<div class="user">
    <div class="center" id="shop-center">
        <div class="user-left">
            <div style="margin-left: 10px">
                注意：<br>
                <span style="line-height: 30px">1.尽可能保证填写完整</span><br>
                <span style="line-height: 30px">2.购买过程，电话保持畅通；</span><br>
                <span style="line-height: 30px">3.如果有其他需求，可添加备注；</span><br>
            </div>
        </div>
        <div class="user-right">
            <div class="right-title">
                <h4>订单总金额：<strong class="g_price" style="color:#f95d50">0</strong></h4>
            </div>
            <div class="user-content">
                <div class="user-form" style="margin-top: 30px">
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'fieldConfig'=>[
                            'template'=>'<div class="box_baseinfo"><span>{label}</span>{input}</div><div class="error" style="margin:0 0 20px 100px;color:red">{error}</div>'
                        ]
                    ]);?>
                    <input class="new-sum" type="hidden" name="OrderForm[sum]" value="">
                    <?= $form->field($order,'recive_user')->textInput(['placeHolder'=>'填写接收人']);?>
                    <?= $form->field($order,'recive_phone')->textInput(['placeHolder'=>'填写接收电话']);?>
                    <?= $form->field($order,'recive_site')->textInput(['placeHolder'=>'填写接收地址:省市区+详细住址']);?>

                    <div class="box_baseinfo">
                        <span>
                            <label class="control-label" for="orderform-orders_time">收货时间</label>
                        </span>
                        <input type="text" id="orderform-orders_time" class="form-control Wdate" name="OrderForm[orders_time]" onfocus="WdatePicker({minDate:'%y-%M-#{%d+1}'})">
                    </div>

                    <?= $form->field($order,'recive_require',['options'=>[['placeHolder'=>'填写详细需求']]])->textarea(['style'=>'width:410px;height:50px']);?>

                    <div class="re-sub">
                        <?=\yii\helpers\Html::submitButton('提交',['title'=>'提交'])?>
                    </div>
                    <?php \yii\widgets\ActiveForm::end();?>
                </div>
            </div>
        </div>

            <div class="shopcart">

            <table style="width: 1000px;padding-top: 60px;margin-left: 260px">
                <thead>
                <th>图片</th>
                <th>名称</th>
                <th>单价</th>
                <th>数量</th>
                <th>小计</th>
                <th>创建时间</th>
                </thead>
                <tbody>
                    <?=$this->render('/goods/_shoporder',['model'=>$cart]);?>
                </tbody>
            </table>

            </div>
    </div>
</div>

<?php
$js = '$("#shop-center").Showcar()';
$this->registerJs($js,\yii\web\View::POS_END);
?>

<!--================================个人中心结束==================================-->

