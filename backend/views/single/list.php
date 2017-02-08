<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title="单页列表";
$css = 'input{width:52px;}select{height:25px;}';
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
                <a href="<?=Url::to(['list'])?>">系统管理</a>
            </li>
            <li class="active">单页列表</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <div class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">单页列表</div>
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a  class="btn btn-sm btn-warning" href="<?=Url::to(['single/add'])?>"><i class="fa fa-plus"></i>&nbsp;创建</a>
                </header>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"></th>
                            <th>编号</th>
                            <th>名称</th>
                            <th>模板</th>
                            <th>描述</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo Html::beginForm(['single/list'],'post',['class'=>'form-horizontal'])?>
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" name="id">
                            </td>
                            <td>
                                <input type="text" name="name">
                            </td>
                            <td>
                                <input type="text" name="view">
                            </td>
                            <td>
                                <input type="text" name="content">
                            </td>
                            <td>
                                <input type="text" name="created_at">
                            </td>
                            <td>
                                <input type="text" name="updated_at">
                            </td>
                            <td>
                                <input type="submit" value="查找" style="display:none">
                            </td>
                        </tr>
                        <?=\yii\helpers\Html::endForm();?>

                        <?php foreach ($model as $v):?>
                            <tr>
                                <td>
                                    <input class="checkone" type="checkbox" value="<?=$v['id']?>">
                                </td>
                                <td><?=$v['id']?></td>
                                <td><?=$v['name']?></td>
                                <td><?=$v['view']?></td>
                                <td><?=$v['description']?></td>
                                <td><?=date('Y-m-d H:i',$v['created_at'])?></td>
                                <td><?=date('Y-m-d H:i',$v['updated_at'])?></td>
                                <td>
                                    <a class="btn btn-sm btn-default" href="<?=Url::to(['single/view','id'=>$v['id']])?>"><i class="fa fa-pencil"></i>&nbsp;查看</a>
                                    <a class="btn btn-sm btn-default" href="<?=Url::to(['single/update','id'=>$v['id']])?>"><i class="fa fa-pencil"></i>&nbsp;修改</a>
                                    <a class="btn btn-sm btn-default single-del"  href="<?=Url::to(['single/del','id'=>$v['id']])?>"><i class="fa fa-trash-o"></i>&nbsp;删除</a>
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
