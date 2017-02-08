<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title="商品分类";
$css = 'input{width:56px;}select{height:25px;}';
$this->registerCss($css);
?>
<div>
    <div class="page-heading">
        <ul class="breadcrumb">
            <li>
                <span class="fa fa-home" aria-hidden="true"></span>
                <a href="<?=Url::to(['index/index'])?>">首页</a>
            </li>
            <li>
                <a href="<?=Url::to(['list'])?>">商品管理</a>
            </li>
            <li class="active">商品分类</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">商品分类</div>
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a  class="btn btn-sm btn-info" href="<?=Url::to(['goods/addcate'])?>"><i class="fa fa-plus"></i>&nbsp;创建</a>
                </header>
                <div class="panel-body">
                    <table class="table table-responsive table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>父级</th>
                            <th>描述</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model as $v):?>
                        <tr>
                            <td><?=$v['name']?></td>
                            <td><?=$v['pid']!=0?:'顶级分类'?></td>
                            <td><?=$v['description']?></td>
                            <td><?=date('Y-m-d H:i:s',$v['updated_at'])?></td>
                            <td><?=date('Y-m-d H:i:s',$v['created_at'])?></td>
                            <td>
                                <a class="label label-info" href="<?=Url::to(['goods/updatecate','id'=>$v['id']])?>">修改</a>
                                <a class="del-category label label-warning" href="<?=Url::to(['goods/delcate','id'=>$v['id']])?>">删除</a>

                            </td>
                        </tr>
                        <?php endforeach;?>
                </div>
            </section>
        </div>
    </div>
</div>
