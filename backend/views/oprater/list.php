<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title="操作记录";
$css = 'input{width:65px;}select{height:25px;}';
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
            <li class="active">操作记录</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">操作记录</div>
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a id="clearall" class="btn btn-sm btn-warning"  href="<?=Url::to(['oprater/clear'])?>"><i class="fa fa-trash-o"></i>&nbsp;清除所有</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th>操作者</th>
                            <th>数据表</th>
                            <th>操作方法</th>
                            <th>会员IP</th>
                            <th>操作路由</th>
                            <th>操作描述</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo Html::beginForm(['oprater/list'],'post',['class'=>'form-horizontal','id'=>'menu-form'])?>
                        <tr>
                            <td>
                                <input type="text" name="oprater">
                            </td>
                            <td>
                                <input type="text" name="tablename">
                            </td>
                            <td>
                                <input type="text" name="methods">
                            </td>
                            <td>
                                <input type="text" name="ip">
                            </td>
                            <td>
                                <input type="text" name="content">
                            </td>
                            <td>
                                <input type="text" name="url">
                            </td>
                            <td>
                            </td>
                            <td>
                                <input type="submit" value="查找" style="display:none">
                            </td>
                        </tr>
                        <?=\yii\helpers\Html::endForm();?>


                        <?php foreach ($models as $v):?>
                            <tr>
                                <td>
                                    <a href="#">
                                        <?= $v['oprater'];?>
                                    </a>
                                </td>
                                <td>
                                    <?= $v['tablename'];?>
                                </td>
                                <td><?= $v['methods'];?></td>
                                <td><?= $v['ip'];?></td>
                                <td><?=$v['url'];?></td>
                                <td><?= mb_substr($v['description'],0,40).'...<a class="see-log" href='.Url::to(['oprater/see','id'=>$v['id']]).'>查看更多</a>';?></td>
                                <td><?= date('Y-m-d H:i',$v['created_at']);?></td>
                                <td><?= date('Y-m-d H:i',$v['updated_at']);?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php echo \yii\widgets\LinkPager::widget(['pagination' => $pages,])?>
                </div>
            </section>
        </div>
    </div>
</div>
