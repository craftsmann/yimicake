<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Material */

$this->title = '材料更新';
?>
<div class="material-update">

    <div class="page-heading">
        <h4><?=Html::a('商品材料',['index'])?></h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">材料更新</li>
        </ul>
    </div>
    <div class="wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
