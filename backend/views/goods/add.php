<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title="商品添加";
$css = 'input{width:56px;}select{height:25px;}.nav-tabs a:hover{color:#fff!important;}';
$this->registerCss($css);
$cate = (new \yii\db\Query())->select('*')->from('{{%category}}')->all();
$data = \yii\helpers\ArrayHelper::map($cate,'id','name');

?>
<div>
    <div class="page-heading">
        <ul class="breadcrumb">
            <li>
                <span class="fa fa-home" aria-hidden="true"></span>
                <a href="<?=Url::to(['index/index'])?>">首页</a>
            </li>
            <li>
                <a href="<?=Url::to(['list'])?>">商品管理</a>
            </li>
            <li class="active">商品添加</li>
        </ul>
    </div>
    <div class="wrapper">

        <ul id="myTab" class="nav nav-tabs" style="margin-left: 14px">
            <li class="active">
                <a href="#shops" data-toggle="tab">商品名称</a>
            </li>
            <li>
                <a href="#shop-attribute" data-toggle="tab">商品属性</a>
            </li>
            <li>
                <a href="#shop-img" data-toggle="tab">商品图片</a>
            </li>
            <li>
                <a href="#shop-detail" data-toggle="tab">商品内容</a>
            </li>
        </ul>

<!--     <form class="form-horizontal">-->
         <?php $form = ActiveForm::begin([
         'options' => ['class' => 'form-horizontal',"enctype" => "multipart/form-data"],
         'fieldConfig'=>[
            'template'=> "<div class=\"col-sm-2 text-right\">{label}\n</div><div class=\"col-sm-8 text-left\">{input}</div>\n{error}",
         ]
         ]);
         ?>


        <div class="tab-content">
            <div class="tab-pane fade in active" id="shops">

                <div class="col-sm-12">

                    <section class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <?= $form->field($model,'title')->textInput()?>
                            </div>
                            <div class="form-group">
                                <?=$form->field($model,'cateid')->dropDownList($data,['prompt' => '请下拉选择'])?>
                            </div>

                            <div class="form-group">
                                <?= $form->field($model,'shopprice')->textInput()?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model,'marketprice')->textInput()?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model,'trueprice')->textInput()?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model,'num')->textInput()?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model,'detail')->textInput()?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model,'package')->textInput()?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model,'words')->textarea(['style'=>'height:100px'])?>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
            <div class="tab-pane fade" id="shop-attribute">

                <div class="col-sm-12">
                    <section class="panel" style="height: 605px">
                        <div class="panel-body">

                            <?=$this->render('_attribute',['model'=>$model,'form'=>$form]);?>
                        </div>
                    </section>
                </div>

            </div>
            <div class="tab-pane fade" id="shop-img">

                <div class="col-sm-12">
                    <section class="panel" style="height: 200px">
                        <div class="panel-body">
                            <input type="hidden" name="GoodsForm[images]" value="" id="f-photo">
                            <?= \common\widgets\imageUpMore\WebUpload::widget([
                                'init'=>[
                                    'pick'=>[
                                        'id'=>'#filePicker',
                                        'label'=>'图像上传'
                                    ],
                                    'auto'=>true,
                                    'resize'=>false,
                                    'fileNumLimit'=>3,
                                    'fileVal'=>'UpmoreForm[images]',
                                    //设置接收处理上传的url;
                                    'server'=>\yii\helpers\Url::to(['upload/loadsmore']),
                                ],
                                'inval' =>[
                                    'id'=>'#f-photo'
                                ],
                            ])?>
                        </div>
                    </section>
                </div>

            </div>
            <div class="tab-pane fade" id="shop-detail">

                <div class="col-sm-12">
                    <section class="panel">
                        <div class="panel-body">
                            <?=
                            \yii\redactor\widgets\Redactor::widget([
                                'model' => $model,
                                'attribute' => 'content',
                                'clientOptions' => [
                                    'lang' => 'zh_cn',
                                     'minHeight'=> 400, // pixels
                                    'imageManagerJson' => ['/redactor/upload/image-json'],
                                    'imageUpload' => ['/redactor/upload/image'],
                                    'fileUpload' => ['/redactor/upload/file'],
                                    'plugins' => ['clips', 'fontcolor','imagemanager','fullscreen','table']
                                ]
                            ]);

                            ?>

                        </div>
                    </section>
                </div>

            </div>
        </div>


        <div class="col-sm-1">
            <div class="form-group pull-right">
                <?=Html::submitButton('提交',['class'=>'btn btn-success pull-left','style'=>'margin-right:20px']);?>
            </div>
        </div>
<!--     </form>-->
        <?php ActiveForm::end();?>
    </div>
