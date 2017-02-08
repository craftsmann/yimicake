<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;
use backend\assets\AppAsset;

AppAsset::addScript($this,'@web/static/js/shop.js');
$this->title="商品用途";

?>
<div>
    <div class="page-heading">
        <h4>商品配置</h4>
        <ul class="breadcrumb">
            <li>
                <a href="#">首页</a>
            </li>
            <li class="active">商品用途</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">商品用途</div>
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a class="btn btn-sm btn-warning add-value" href="<?=Url::to(['shop/addvalue'])?>"><i class="fa fa-plus"></i>&nbsp;添加</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"></th>
                            <th>ID</th>
                            <th>名称</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $v):?>
                            <tr>
                                <td><input type="checkbox" class="checkone"></td>
                                <td><?=$v['id']?></td>
                                <td><?= $v['vname'];?></td>
                                <td><?= date('Y-m-d H:i',$v['created_at']);?></td>
                                <td><?= date('Y-m-d H:i',$v['updated_at']);?></td>
                                <td>
                                    <a class="btn btn-xs btn-info" index="<?=$v['id']?>" href="javascript:;" style="color: #fff;"><i class="fa fa-pencil"></i>&nbsp;修改</a>
                                    <a class="btn btn-xs btn-warning"  index="<?=$v['id']?>" href="javascript:;" style="color: #fff;"><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
