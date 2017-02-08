<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Design */

$this->title ='造型添加';
?>
<div class="design-create">

    <div class="page-heading">
        <h4><?=Html::a('商品造型',['index'])?></h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">造型添加</li>
        </ul>
    </div>
    <div class="wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
