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
         content:"'.Url::to(['menu/fadd']).'"
      });    
   });
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
         content:"'.Url::to(['menu/fupdate']).'",
         success:function(){
              var body  = layer.getChildFrame("body");
              body.contents().find("#up-id").val(index);
              body.contents().find("#up-name").val($.trim(tr.eq(0).text()));
              body.contents().find("#up-route").val($.trim(tr.eq(2).text()));
              body.contents().find("#up-order").val($.trim(tr.eq(3).text()));
              body.contents().find("#up-icon").val($.trim(tr.eq(4).text()));
              var up = tr.eq(1).find("a").eq(0).attr("data-val");
              body.contents().find("#select option[value="+up+"]").attr("selected",true);   
         },
      }); 
   });
   
   
   //删除
   $(".menu-del").on("click",function(e){
     e.preventDefault();
     var value = $(this).attr("index");
     layer.confirm("确定删除吗？",{"icon":3},
     function(){
       $.get("'.Url::to(["menu/fdel"]).'",{id:value},function(data){
                if(data["status"]==1){
                   layer.msg(data["msg"], {icon: 1,time:800});
                   location.reload();
                 }else{
                   layer.msg(data["msg"], {icon: 2,time:500});
                }
              },"json");
       
     });
   
   
   });
';
$css = 'input{width:115px;}';
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
            <li class="active">前台菜单</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <a id="menu-ad" class="btn btn-danger" href="javascript:;">新增菜单</a>
                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th class="hidden-phone">父级名称</th>
                            <th>路由</th>
                            <th>排序</th>
                            <th>icon</th>
                            <th>创建时间</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo Html::beginForm(['menu/flist'],'get',['class'=>'form-horizontal','id'=>'sub-form'])?>
                        <tr>
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
                                <input type="text" name="order" style="width: 50px">
                            </td>
                            <td>
                                <input type="text" name="icon" style="width: 50px">
                            </td>
                            <td>
                                <input type="submit" value="查找" style="display: none">
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?=\yii\helpers\Html::endForm();?>


                        <?php foreach ($models as $v):?>
                            <tr>
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
                                <td><?= date('Y-m-d H:i:s',$v['created_at']);?></td>
                                <td><?= date('Y-m-d H:i:s',$v['updated_at']);?></td>
                                <td>
                                    <a class="btn btn-sm btn-default menu-up" index="<?=$v['id']?>" href="javascript:;"><i class="fa fa-pencil"></i>修改</a>
                                    <a class="btn btn-sm btn-default menu-del"  index="<?=$v['id']?>" href="javascript:;"><i class="fa fa-trash-o"></i>删除</a>
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
