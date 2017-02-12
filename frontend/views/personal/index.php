<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<!--================================个人中心开始==================================-->

<div class="user">
    <div class="center">
        <div class="user-left">
            <dl>
                <dt><a href="javascript:void(0)" class="user-info">个人中心</a></dt>
                <dd class="cur"><a href="<?=\yii\helpers\Url::to(['personal/index'])?>">基本信息</a></dd>
            </dl>
            <dl>
                <dt><a href="javascript:void(0)" class="user-orders">我的订单</a></dt>
                <dd><a href="#">订单明细</a></dd>
            </dl>
            <dl>
                <dt><a href="javascript:void(0)" class="user-collect">我的足迹</a></dt>
                <dd><a href="<?=\yii\helpers\Url::to(['credit/list'])?>">积分获得</a></dd>
            </dl>
        </div>
        <div class="user-right">
            <div class="right-title">
                <span>基本信息</span>
            </div>
            <div class="user-content">
                <div class="user-form">
                   <?php $model->sex=!isset(\Yii::$app->user->identity->sex)?'':Yii::$app->user->identity->sex;?>
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'fieldConfig'=>[
                            'template'=>'<div class="box_baseinfo"><span>{label}</span>{input}</div><div class="error" style="margin:0 0 20px 100px;color:red">{error}</div>'
                        ]
                    ]);?>
                    <?= $form->field($model,'truename')->textInput(['value'=>!isset(\Yii::$app->user->identity->truename)?'':Yii::$app->user->identity->truename]);?>
                    <?= $form->field($model,'phone')->textInput(['value'=>!isset(\Yii::$app->user->identity->phone)?'':Yii::$app->user->identity->phone]);?>
                    <?= $form->field($model,'qq')->textInput(['value'=>!isset(\Yii::$app->user->identity->qq)?'':Yii::$app->user->identity->qq]);?>
                    <?= $form->field($model,'site')->textInput(['value'=>!isset(\Yii::$app->user->identity->site)?'':Yii::$app->user->identity->site]);?>
                    <?= $form->field($model,'sex')->dropDownList(['男'=>'男','女'=>'女'])?>
                    <div class="re-sub">
                        <?=\yii\helpers\Html::submitButton('提交',['placeHolder'=>'提交'])?>
                    </div>
                    <?php \yii\widgets\ActiveForm::end();?>
                </div>
                </div>
        </div>
    </div>
</div>


<!--================================个人中心结束==================================-->

