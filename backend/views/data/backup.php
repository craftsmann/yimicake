<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use backend\assets\AppAsset;

AppAsset::register($this);

$this->title="菜单列表";
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
                <a href="<?=Url::to(['backup'])?>">数据库管理</a>
            </li>
            <li class="active">数据备份</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">数据库备份(共<?=count($db)?>张表)</div>
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a class="btn btn-sm btn-info db-optimiz" type="1" href="<?=Url::to(['data/optimizeall'])?>"><i class="fa fa-plus"></i>&nbsp;优化</a>
                    <a class="btn btn-sm btn-warning db-backall" type="2" href="<?=Url::to(['data/backupall'])?>"><i class="fa fa-trash-o"></i>&nbsp;备份</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"></th>
                            <th>数据表</th>
                            <th>数据大小(字节)</th>
                            <th>数据条数</th>
                            <th>数据描述</th>
                            <th>表引擎</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                              <?php foreach ($db as $v):?>
                              <tr>
                                  <td>
                                      <input type="checkbox" class="checkone" value="<?=$v['Name']?>">
                                  </td>
                                  <td><?=$v['Name']?></td>
                                  <td><?=$v['Data_length']?></td>
                                  <td><?=$v['Rows']?></td>
                                  <td><?=$v['Comment']!==''?$v['Comment']:"未补充"?></td>
                                  <td><?=$v['Engine']?></td>
                                  <td><?=$v['Create_time']?></td>
                                  <td><?=$v['Update_time']!==null?$v['Update_time']:"暂未更新"?></td>
                                  <td>
                                      <a class="btn btn-xs btn-success optimize" data="<?=$v['Name']?>" href="<?=Url::to(['data/optimize','name'=>$v['Name']])?>" style="color:#fff;"><i class="fa fa-pencil"></i>&nbsp;优化</a>
                                      <a class="btn btn-xs btn-warning backupone" href="<?=Url::to(['data/backupone','name'=>$v['Name']])?>" style="color:#fff;"><i class="fa fa-trash-o"></i>&nbsp;备份</a>
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
