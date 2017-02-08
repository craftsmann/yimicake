<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Color */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="color-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'coname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cate_id')->dropDownList(Yii::$app->params['CATE'],['prompt'=>'请选择分类'])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
