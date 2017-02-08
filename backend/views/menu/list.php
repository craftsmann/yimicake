<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title="菜单列表";
$js = '
   //添加
   $("#menu-ad").on("click",function(ev){
      ev.preventDefault();
      
      layer.open({
         type:2,
         title:"添加菜单",
         area:["600px","600px"],
         content:"'.Url::to(['menu/add']).'"
      });    
   });
   //刷新
   $(".refresh").on("click",function(){window.location.reload();});
   //更新
   $(".menu-up").on("click",function(ev){
      ev.preventDefault();
      var index = $(this).attr("index");
      var tr    =  $(this).parent().siblings();
      console.log(tr.eq(2).text());

      layer.open({
         type:2,
         title:"修改菜单",
         area:["600px","600px"],
         content:"'.Url::to(['menu/update']).'",
         success:function(){
              var body  = layer.getChildFrame("body");
              body.contents().find("#up-id").val(index);
              body.contents().find("#up-name").val($.trim(tr.eq(1).text()));
              body.contents().find("#up-route").val($.trim(tr.eq(3).text()));
              body.contents().find("#up-order").val($.trim(tr.eq(4).text()));
              body.contents().find("#up-icon").val($.trim(tr.eq(5).text()));
              var up = tr.eq(2).find("a").eq(0).attr("data-val");
              body.contents().find("#select option[value="+up+"]").attr("selected",true);   
         },
      }); 
   });
   
   
   //删除单个
   $(".menu-del").on("click",function(e){
     e.preventDefault();
     var value = $(this).attr("index");
     layer.confirm("确定删除吗？",{"icon":3},
     function(){
       $.get("'.Url::to(["menu/del"]).'",{id:value},function(data){
                if(data["status"]==1){
                   layer.msg(data["msg"], {time:800});
                   location.reload();
                 }else{
                   layer.msg(data["msg"], {time:500});
                }
              },"json");
       
     });
   
   
   });
';
$css = 'input{width:65px;}select{height:25px;}';
$this->registerJS($js);
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
                <a href="<?=Url::to(['list'])?>">菜单管理</a>
            </li>
            <li class="active">菜单列表</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">后台菜单</div>
                    <a class="btn btn-sm btn-success refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a id="menu-ad" class="btn btn-sm btn-danger user-create" href="javascript:;"><i class="fa fa-plus"></i>&nbsp;创建</a>
                    <a class="btn btn-sm btn-default delallmenu"  href="<?=Url::to(['menu/delall'])?>"><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"></th>
                            <th>名称</th>
                            <th class="hidden-phone">父级名称</th>
                            <th>路由</th>
                            <th>排序</th>
                            <th>icon</th>
                            <th>显示</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo Html::beginForm(['menu/list'],'post',['class'=>'form-horizontal','id'=>'menu-form'])?>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="text" name="name">
                                </td>
                                <td>
                                    <input type="text" name="pid">
                                </td>
                                <td>
                                    <input type="text" name="route">
                                </td>
                                <td>
                                    <input type="text" name="order">
                                </td>
                                <td>
                                    <input type="text" name="icon">
                                </td>
                                <td>
                                    <select name="visiable" class="visi-select">
                                        <option value="" <?=$visiable==''?'selected':''?>></option>
                                        <option value="1" <?=$visiable==1?'selected':''?>>显示</option>
                                        <option value="2" <?=$visiable==2?'selected':''?>>隐藏</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="submit" value="查找" style="display:none">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                           <?=\yii\helpers\Html::endForm();?>


                       <?php foreach ($models as $v):?>
                        <tr>
                            <td><input type="checkbox" class="checkone" value="<?=$v['id']?>"></td>
                            <td>
                                <a href="#">
                                    <?= $v['name'];?>
                                </a>
                            </td>
                            <td>
                                <?php
                                if(count($v['subMenu'])==0){
                                    echo '顶级菜单';
                                }else{
                                    foreach ($v['subMenu'] as $val){
                                        echo "<a href='#' data-val='".$val['id']."'>".$val['name']."</a>";
                                    }
                                }
                                ?>
                            </td>
                            <td><?= $v['route'];?></td>
                            <td><?= $v['order'];?></td>
                            <td><?= $v['data'];?></td>
                            <td><?php if($v['visiable']==1){echo '<a class="label label-success change-status" href="'.Url::to(['menu/upview','id'=>$v['id'],'visiable'=>$v['visiable']]).'" style="color: #fff">显示</a>';}else{echo '<a class="label label-danger change-status" href="'.Url::to(['menu/upview','id'=>$v['id'],'visiable'=>$v['visiable']]).'" style="color: #fff">隐藏</a>';}?></td>
                            <td><?= date('Y-m-d H:i',$v['created_at']);?></td>
                            <td><?= date('Y-m-d H:i',$v['updated_at']);?></td>
                            <td>
                                <a class="btn btn-sm btn-default menu-up" index="<?=$v['id']?>" href="javascript:;"><i class="fa fa-pencil"></i>&nbsp;修改</a>
                                <a class="btn btn-sm btn-default menu-del"  index="<?=$v['id']?>" href="javascript:;"><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                            </td>
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
