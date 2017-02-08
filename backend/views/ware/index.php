<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商品属性';
?>

<div class="value-index">

    <div class="page-heading">
        <h4>商品用途</h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">商品用途</li>
        </ul>
    </div>
    <div class="wrapper">
        <p>
            <?= Html::a('添加用途', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'vname',
                [
                    'label' => '分类名称',
                    'value' => 'catename.name',
                ],
                [
                    'attribute' => 'created_at',
                    'label'=>'创建时间',
                    'value'=>
                        function($model){
                            return  date('Y-m-d H:i:s',$model->created_at);   //主要通过此种方式实现
                        },
                ],
                [
                    'attribute'=>'updated_at',
                    'label'    =>'更新时间',
                    'value'    =>function($model){
                             return date('Y-m-d H:i:s',$model->updated_at);
                    }
                ],

                ['class' => 'yii\grid\ActionColumn',
                    'header'=>'操作',
                    'template' => '{view} {update} {delete}',
                    'buttons'=>[
                        'view'=>function($url){
                            return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => '查看'] );
                        },
                        'update'=>function($url){
                            return Html::a('<span class="fa fa-edit"></span>', $url, ['title' => '修改'] );
                        },
                        'delete'=>function($url){
                            return Html::a('<span class="fa fa-trash-o"></span>', $url, ['title' => '删除'] );
                        }
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>
