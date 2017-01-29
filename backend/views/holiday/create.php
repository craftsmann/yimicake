<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Holiday */

$this->title = '节日添加';
?>
<div class="holiday-create">

    <div class="page-heading">
        <h4><?=Html::a('商品节日',['index'])?></h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">节日添加</li>
        </ul>
    </div>
    <div class="wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
