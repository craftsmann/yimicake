<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title="订单列表";
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
                <a href="<?=Url::to(['list'])?>">商品管理</a>
            </li>
            <li class="active">订单列表</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">订单列表</div>
                    <a class="btn btn-sm btn-success refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"></th>
                            <th>订单号</th>
                            <th class="hidden-phone">订单用户</th>
                            <th>订单总额</th>
                            <th>订单状态</th>
                            <th>下单时间</th>
                            <th>修改时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo Html::beginForm(['goods/order'],'post',['class'=>'form-horizontal','id'=>'menu-form'])?>
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
                                <select name="visiable" class="visi-select">
                                    <option>未付款</option>
                                    <option>已发货</option>
                                    <option>正在退货</option>
                                    <option>交易成功</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="order">
                            </td>
                            <td>
                                <input type="text" name="icon">
                            </td>
                            <td>
                                <input type="submit" value="查找" style="display:none">
                            </td>
                        </tr>
                        <?=\yii\helpers\Html::endForm();?>

                          <?php foreach ($model as $v):?>
                               <tr>
                                   <td><?=$v['orders_id']?></td>
                                   <td><?=$v['uid']?></td>
                                   <td><?=$v['sum']?></td>
                                   <td><?=$v['status']?></td>
                                   <td><?=date('Y-m-d H:i:s',$v['created_at'])?></td>
                                   <td><?=date('Y-m-d H:i:s',$v['updated_at'])?></td>
                               </tr>
                          <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
