<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Color */

$this->title = '颜色更新';
?>
<div class="color-update">

    <div class="page-heading">
        <h4><?=Html::a('商品颜色',['index'])?></h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">颜色更新</li>
        </ul>
    </div>
    <div class="wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
