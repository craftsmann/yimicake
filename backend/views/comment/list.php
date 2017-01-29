<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title="评论列表";
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
                <a href="<?=Url::to(['list'])?>">评论管理</a>
            </li>
            <li class="active">评论列表</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">评论列表</div>
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;" ><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a class="btn btn-sm btn-warning delallmenu"  href="<?=Url::to(['comment/upall'])?>"><i class="fa fa-trash-o"></i>&nbsp;批量审核</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"></th>
                            <th>ID</th>
                            <th>用户</th>
                            <th>商品</th>
                            <th>评论</th>
                            <th>状态</th>
                            <th>用户ip</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?= Html::beginForm('','post',['id'=>'menu-form'])?>
                        <tr>
                            <td></td>
                            <td><input type="text" name="id"></td>
                            <td><input type="text" name="username"></td>
                            <td><input type="text" name="title"></td>
                            <td><input type="text" name="comment"></td>
                            <td>
                                <select name="type" class="visi-select">
                                    <option value='' <?=$status==''?'selected':''?>>--</option>
                                    <option value="1" <?=$status==='1'?'selected':''?>>通过</option>
                                    <option value="2" <?=$status==='2'?'selected':''?>>审核</option>
                                </select>
                            </td>
                            <td><input type="text" name="login_ip"></td>
                            <td><input type="text" name="created_at"></td>
                            <td><input type="text" name="updated_at"></td>
                            <td><input type="submit" style="display: none"></td>
                        </tr>
                        <?= Html::endForm();?>

                        <?php foreach ($model as $v):?>
                            <tr>
                                <td style="width: 10px"><input class="checkone" type="checkbox"  value="<?=$v['id']?>"></td>
                                <td><?=$v['id']?></td>
                                <td><?=$v['users']['username']?></td>
                                <td><?=$v['goods']['title']?></td>
                                <td style="width: 20%"><?=mb_substr($v['comment'],0,100);?></td>
                                <td><?php if($v['type']==1){echo '<a class="label label-success change-status" href="'.Url::to(['comment/upview','id'=>$v['id'],'type'=>$v['type'],]).'" style="color: #fff">通过</a>';}else{echo '<a class="label label-danger change-status" href="'.Url::to(['comment/upview','id'=>$v['id'],'type'=>$v['type']]).'" style="color: #fff">审核</a>';}?></td>
                                <td><?=$v['users']['login_ip']?></td>
                                <td><?=date('Y-m-d H:i',$v['created_at'])?></td>
                                <td><?=date('Y-m-d H:i',$v['updated_at'])?></td>
                                <td style="width: 165px">
                                    <a class="btn btn-sm btn-default change-status"  href="<?=Url::to(['comment/upview','type'=>$v['type'],'id'=>$v['id']])?>"><i class="fa fa-pencil"></i>&nbsp;审核</a>
                                    <a class="btn btn-sm btn-default comment-del" href="<?=Url::to(['comment/del','id'=>$v['id']])?>" ><i class="fa fa-trash-o"></i>&nbsp;删除</a>
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
