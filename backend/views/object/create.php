<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Object */

$this->title = '对象添加';
?>
<div class="object-create">

    <div class="page-heading">
        <h4><?=Html::a('商品对象',['index'])?></h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">对象添加</li>
        </ul>
    </div>
    <div class="wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
