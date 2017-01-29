<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Material */

$this->title = '更新展示';
?>
<div class="material-view">

    <div class="page-heading">
        <h4><?=Html::a('商品节日',['index'])?></h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">修改展示</li>
        </ul>
    </div>

    <div class="wrapper">

        <p>
            <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('删除', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '确定删除该项?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hname',
            'created_at',
            'updated_at',
        ],
    ]) ?>
</div>
