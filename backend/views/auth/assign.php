<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<div>
    <div class="page-heading" style="margin-top: 10px">
        <ul class="breadcrumb">
            <li>
                <span class="fa fa-home" aria-hidden="true"></span>
                <a href="<?=Url::to(['index/index'])?>">首页</a>
            </li>
            <li>
                <a href="<?=Url::to(['route'])?>">权限管理</a>
            </li>
            <li class="active">角色分配</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <header class="panel-heading">
                        角色分配
                    </header>
                    <div class="panel">
                        <div class="panel-body">
                            <table class="table  table-hover general-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>用户名</th>
                                    <th>角色分配</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $id=1;?>
                                <?php foreach ($model as $v):?>
                                    <tr>
                                        <td><?= $id?></td>
                                        <td><?= $v['username']?></td>
                                        <td><a class="label label-success" style="color: #fff" href="<?=Url::to(['auth/assignrole','id'=>$v['id']])?>">分配</a></td>
                                    </tr>
                                    <?php $id++;?>
                                <?php endforeach;?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>