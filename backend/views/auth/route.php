<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use backend\assets\AppAsset;

AppAsset::addCss($this,'@web/static/css/app.css');
$this->title="路由列表";

$js = '
   //删除
   $(".route-del").on("click",function(e){
     e.preventDefault();
     var name = $(this).attr("data-index");
     var id = $(this).attr("data-id");
     if(confirm("确定删除？")){
        $.get("'.Url::to(["auth/delroute"]).'",{name:name,id:id},function(data){
                if(data["status"] == 1){
                   layer.msg(data["msg"], {icon: 1,time:1500});
                   location.reload();
                 }else if(data["status"] == 3){
                   layer.msg(data["msg"], {icon: 2,time:1500});
                 }else{
                   layer.msg(data["msg"], {icon: 2,time:1500});
                 }
              },"json");
            };})';
$this->registerJS($js,\yii\web\View::POS_END);

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
            <li class="active">路由列表</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <a id="menu-ad" class="btn btn-info" href="<?=Url::to(['auth/addroute','type'=>1,'pid'=>0])?>">新增路由</a>
                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <div class="box role-box">
                       <?php foreach ($data as $v){?>
                        <dl>
                            <dt style="background: #eee;">
                                <h3>
                                    <?= $v['description']?>
                                    <small>
                                        [<a href="<?=Url::to(['auth/addroute','type'=>2,'pid'=>$v['id']])?>">添加</a>][<a href="javascript:;" class="route-del" data-index="<?=$v['name']?>" data-id="<?=$v['id']?>">删除</a>]
                                    </small>
                                </h3>
                            </dt>
                               <?php foreach ($v['child'] as $val):?>
                               <dd>
                                  <span><?=$val['description']?></span>
                                   <small>[<a href="javascript:;" class="route-del" data-index="<?=$val['name']?>" data-id="<?=$val['id']?>">删除</a>]</small>
                               </dd>
                               <?php endforeach;?>
                        </dl>
                        <?php }?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

