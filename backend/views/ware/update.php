<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Value */

$this->title = '修改';
?>
<div class="value-update">
    <div class="page-heading">
        <h4><?=Html::a('商品用途',['index'])?></h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">用途修改</li>
        </ul>
    </div>
    <div class="wrapper">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>

</div>
