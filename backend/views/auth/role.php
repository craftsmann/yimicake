<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title="角色列表";
$js = '
   //添加
   $("#role-ad").on("click",function(ev){
      ev.preventDefault();
      
      layer.open({
         type:2,
         title:"添加菜单",
         area:["600px","400px"],
         content:"'.Url::to(['auth/addrole']).'"
      });    
   });
   
   
   //删除
   $(".role-del").on("click",function(e){
     e.preventDefault();
     var value = $(this).attr("data-index");
     if(confirm("确认删除？")){
        $.post("'.Url::to(["auth/delrole"]).'",{name:value},function(data){
                if(data["status"]==1){
                   layer.msg(data["message"], {icon: 1,time:2000});
                   location.reload();
                 }else{
                   layer.msg(data["message"], {icon: 2,time:2000});
                }
              },"json");
     }
   });
';
$this->registerJS($js);
?>
<div>
    <div class="page-heading">
        <ul class="breadcrumb">
            <li>
                <span class="fa fa-home" aria-hidden="true"></span>
                <a href="<?=Url::to(['index/index'])?>">首页</a>
            </li>
            <li>
                <a href="<?=Url::to(['route'])?>">权限管理</a>
            </li>
            <li class="active">角色列表</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a id="role-ad" class="btn btn-sm btn-danger user-create" href="javascript:;"><i class="fa fa-plus"></i>&nbsp;创建</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th>角色</th>
                            <th>描述</th>
                            <th>更新时间</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $v):?>
                            <tr>
                                <td><?= $v->name?></td>
                                <td><?= $v->description?></td>
                                <td><?= date('Y-m-d H:i:s',$v->updatedAt)?></td>
                                <td><?= date('Y-m-d H:i:s',$v->createdAt)?></td>
                                <td>
                                    <a class="label label-info" style="color: #fff" href="<?=Url::to(['auth/assignroute','name'=>$v->name])?>">分配权限</a>
                                    <a class="label label-success" style="color: #fff" href="<?=Url::to(['auth/uprole','name'=>$v->name])?>">修改</a>
                                    <a data-index="<?=$v->name?>" class="label label-default role-del" href="javascript:;" style="color: #fff">删除</a>
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
