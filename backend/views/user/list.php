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
   $(".user-create").on("click",function(ev){
      ev.preventDefault();
      layer.open({
         type:2,
         title:"添加用户",
         area:["600px","600px"],
         content:"'.Url::to(['user/add']).'"
      });    
   });
   //刷新
   $(".user-refresh").bind("click",function(){window.location.reload();});
   
   //提交
   $(".user-sle").on("change",function(){$(this).attr("selected",true);$("#user-list").submit();})
  
   
   //更新
   $(".user-up").bind("click",function(e){
     e.preventDefault();
     var index  = $(this).attr("href");
     layer.open({
         type:2,
         title:"更新用户",
         area:["600px","600px"],
         content:index
      }); 
   
   });
   
   //批量删除
   $(".del-check").on("click",function(){
      if($(this).attr("checked")){
        $(".check-item").attr("checked",true);
      }else{
        $(".check-item").attr("checked",false); 
      }
   });
  //删除单个
   $(".user-del").on("click",function(e){
     e.preventDefault();
     var value = $(this).attr("index");
 
     if(confirm("确定删除吗？")){
        $.get("'.Url::to(["user/del"]).'",{id:value},function(data){
                if(data["status"]==1){
                   layer.msg(data["msg"], {time:1200},function(){location.reload();});
                  
                 }else{
                   layer.msg(data["msg"], {time:1200});
                }
              },"json");
     };
   });  
       
   //删除所有
   $(".delall").on("click",function(e){
     e.preventDefault();
     var value = $(this).attr("index");
     var id = [];
     if($(".check-item:checked").length==0){
       layer.msg("至少选中一个！",{time:1200});
       return;
     }
     $(".check-item:checked").each(function(){
         id.push($(this).attr("value"));
     });
     var ids = id.join(",");
     if(confirm("确定删除吗？")){
        $.post("'.Url::to(["user/delall"]).'",{id:ids},function(data){
                if(data["status"]==1){
                   layer.msg(data["msg"], {time:1200},function(){location.reload();});
                  
                 }else{
                   layer.msg(data["msg"], {time:1200});
                }
              },"json");
     }
     
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
                <a href="<?=Url::to(['list'])?>">用户管理</a>
            </li>
            <li class="active">后台用户</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">后台用户</div>
                    <a class="btn btn-sm btn-success user-refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a class="btn btn-sm btn-info user-create" href="javascript:;"><i class="fa fa-plus"></i>&nbsp;创建</a>
                    <a class="btn btn-sm btn-warning delall"  href="javascript:;"><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="del-check"></th>
                            <th>用户名</th>
                            <th>性别</th>
                            <th>头像</th>
                            <th>邮箱</th>
                            <th>qq</th>
                            <th>电话</th>
                            <th>状态</th>
                            <th>Ip地址</th>
                            <th>生日</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                           <?= Html::beginForm('','post',['id'=>'user-list'])?>
                            <tr>
                            <td></td>
                            <td><input type="text" name="name"></td>
                            <td><select class="user-sle" name="sex">
                                    <option value="" <?=$sex==''?'selected':''?>></option>
                                    <option value="男" <?=$sex=='男'?'selected':''?>>男</option>
                                    <option value="女" <?=$sex=='女'?'selected':''?>>女</option>
                                </select>
                            </td>
                            <td><input type="text"></td>
                            <td><input type="text" name="email"></td>
                            <td><input type="text" name="qq"></td>
                            <td><input type="text" name="phone"></td>
                            <td><select class="user-sle" name="status">
                                    <option value="" <?=$status==''?'selected':''?>></option>
                                    <option value="10" <?=$status=='10'?'selected':''?>>激活</option>
                                    <option value="0" <?=$status=='0'?'selected':''?>>锁定</option>
                            </td>
                            <td><input type="text" name="login_ip"></td>
                            <td></td>
                            <td></td>
                            <td><input type="submit" style="display: none"></td>
                            </tr>
                           <?= Html::endForm();?>
                        <?php foreach ($model as $v):?>
                            <tr>
                            <td style="width: 10px"><input class="check-item" type="checkbox"  name="Select[]" value="<?=$v['id']?>"></td>
                            <td><?=$v['username']?></td>
                            <td><?=$v['sex']?></td>
                            <td><img alt="头像" style="width:30px;height:30px;"  src="<?= isset($v['photo'])?'http://localhost/yimicake/frontend/web/'.$v['photo']:'static/images/photos/user-avatar.png'?>" class="media-object"></td>
                            <td><?=$v['email']?></td>
                            <td><?=$v['qq']?></td>
                            <td><?=$v['phone']?></td>
                            <td><?php if($v['status']==10){echo '<a class="label label-success user-status" href="'.Url::to(['user/upstatus','id'=>$v['id'],'status'=>$v['status']]).'" style="color: #fff">激活</a>';}else{echo '<a class="label label-danger user-status" href="'.Url::to(['user/upstatus','id'=>$v['id'],'status'=>$v['status']]).'" style="color: #fff">已锁定</a>';}?></td>
                            <td><?=$v['login_ip']?></td>
                            <td><?=date('Y-m-d H:i',$v['created_at'])?></td>
                            <td style="width: 165px">
                                <a class="btn btn-sm btn-default user-up"  href="<?=Url::to(['user/update','id'=>$v['id']])?>"><i class="fa fa-pencil"></i>&nbsp;修改</a>
                                <a class="btn btn-sm btn-default user-del" index="<?=$v['id']?>" href="javascript:;" ><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                            </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <?php echo \yii\widgets\LinkPager::widget(['pagination' => $pages])?>
                </div>
            </section>
        </div>
    </div>
</div>
