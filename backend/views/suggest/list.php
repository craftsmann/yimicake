<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title="反馈列表";
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
                <a href="<?=Url::to(['comment/list'])?>">评论管理</a>
            </li>
            <li class="active">反馈列表</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">反馈列表</div>
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;" ><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a class="btn btn-sm btn-warning delallmenu"  href="<?=Url::to(['suggest/delall'])?>"><i class="fa fa-trash-o"></i>&nbsp;批量删除</a>
                </header>
                <div class="panel-body">
                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"></th>
                            <th>ID</th>
                            <th>类型</th>
                            <th>昵称</th>
                            <th>内容</th>
                            <th>邮箱</th>
                            <th>用户ip</th>
                            <th>发布平台</th>
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
                            <td>
                                <select name="type" class="visi-select">
                                    <option value='' <?=$status==''?'selected':''?>>--</option>
                                    <option value="1" <?=$status==='1'?'selected':''?>>商品</option>
                                    <option value="2" <?=$status==='2'?'selected':''?>>服务</option>
                                    <option value="3" <?=$status==='3'?'selected':''?>>其他</option>
                                </select>
                            </td>
                            <td><input type="text" name="nickname"></td>
                            <td><input type="text" name="content"></td>
                            <td><input type="text" name="email"></td>
                            <td><input type="text" name="ip"></td>
                            <td><input type="text" name="oprater"></td>
                            <td><input type="text" name="created_at"></td>
                            <td><input type="text" name="updated_at"></td>
                            <td><input type="submit" style="display: none"></td>
                        </tr>
                        <?= Html::endForm();?>

                        <?php foreach ($model as $v):?>
                            <tr>
                                <td style="width: 10px"><input class="checkone" type="checkbox"  value="<?=$v['id']?>"></td>
                                <td><?=$v['id']?></td>
                                <td><?php if($v['type']==1){echo '<a class="label label-success" href="javascript:;" style="color: #fff">商品</a>';}elseif($v['type']==2){echo '<a class="label label-success" href="javascript:;" style="color: #fff">服务</a>';}else{echo '<a class="label label-success" href="javascript:;" style="color: #fff">其他</a>';}?></td>
                                <td><?=$v['nickname']?></td>
                                <td style="width: 20%"><?=$v['content'];?></td>
                                <td><?=$v['email']?></td>
                                <td><?=$v['ip']?></td>
                                <td><?=$v['oprater']?></td>
                                <td><?=date('Y-m-d H:i',$v['created_at'])?></td>
                                <td><?=date('Y-m-d H:i',$v['updated_at'])?></td>
                                <td style="width: 165px">
                                    <a class="btn btn-sm btn-default comment-del" href="<?=Url::to(['suggset/del','id'=>$v['id']])?>" ><i class="fa fa-trash-o"></i>&nbsp;删除</a>
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
