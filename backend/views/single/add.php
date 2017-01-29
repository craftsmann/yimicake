<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title="单页添加";
$css = 'input{width:52px;}select{height:25px;}';
$this->registerCss($css);
?>
<div>
    <div class="page-heading">
        <ul class="breadcrumb">
            <li>
                <span class="fa fa-home" aria-hidden="true"></span>
                <a href="<?=Url::to(['index/index'])?>">首页</a>
            </li>
            <li>
                <a href="<?=Url::to(['list'])?>">系统管理</a>
            </li>
            <li class="active">单页添加</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <div class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">单页添加</div>
                </header>

                <?php $form = \yii\widgets\ActiveForm::begin([
                    'options' => ['class' => 'form-horizontal'],
                ]);
                ?>

                <div class="panel-body" style="padding: 30px">
                    <?= $form->field($model,'name')->textInput()?>


                    <?=$form->field($model,'view')->textInput()?>

                    <?=$form->field($model,'description')->textInput()?>

                    <?=$form->field($model,'content')->widget('kucha\ueditor\UEditor',[]);?>


                </div>
                <div class="col-sm-12">
                    <div class="form-group pull-right">
                        <?=Html::submitButton('提交',['class'=>'btn btn-success btn-block pull-left','style'=>'margin-top:10px;margin-right:35px']);?>
                    </div>
                </div>
                <?php \yii\widgets\ActiveForm::end();?>
            </div>
            </div>
        </div>
    </div>
