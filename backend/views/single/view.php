<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title="查看单页";
$css = 'input{width:52px;}select{height:25px;}';
$this->registerCss($css);
?>
<div>
    <div class="page-heading">
        <h4>系统管理</h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">查看单页</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <div class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">查看单页</div>
                </header>
                <div class="panel-body">
                    <?=\yii\widgets\DetailView::widget([
                         'model'=>$model,
                         'attributes'=>[
                             'id',
                             'name',
                             'view',
                             'description',
                             'created_at',
                             'updated_at'
                         ],
                    ])?>
                </div>
                </section>
            </div>
        </div>
    </div>
