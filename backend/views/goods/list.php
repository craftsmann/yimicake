<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title="商品列表";
$css = 'input{width:52px;}select{height:25px;}';
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
        <li class="active">商品列表</li>
    </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12" style="width: 110%">
            <div class="panel">
                <header class="panel-heading">
                    <div style="margin-bottom: 20px">商品列表</div>
                    <a class="btn btn-sm btn-success in-refresh" href="javascript:;"><i class="fa fa-refresh"></i>&nbsp;刷新</a>
                    <a  class="btn btn-sm btn-info" href="<?=Url::to(['goods/add'])?>"><i class="fa fa-plus"></i>&nbsp;创建</a>
                    <a  class="btn btn-sm btn-warning goods_show" href="<?=Url::to(['goods/upshow','type'=>'on'])?>"><i class="fa fa-plus"></i>&nbsp;批量上架</a>
                    <a  class="btn btn-sm btn-danger goods_show" href="<?=Url::to(['goods/upshow','type'=>'up'])?>"><i class="fa fa-plus"></i>&nbsp;批量下架</a>
                </header>
                <div class="panel-body">
                    <table class="table table-hover" style="width:800px!important;">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"></th>
                            <th>编号</th>
                            <th>名称</th>
                            <th>分类</th>
                            <th>展示价</th>
                            <th>市场价</th>
                            <th>成本价</th>
                            <th>库存</th>
                            <th>销量</th>
                            <th>上架</th>
                            <th>促销</th>
                            <th>推荐</th>
                            <th>轮播</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php echo Html::beginForm(['goods/list'],'post',['class'=>'form-horizontal','id'=>'menu-form'])?>
                        <tr>
                            <td></td>
                            <td>
                                <input type="text" name="id">
                            </td>
                            <td>
                                <input type="text" name="title">
                            </td>
                            <td>
                                <input type="text" name="cateid">
                            </td>
                            <td>
                                <input type="text" name="shopprice">
                            </td>
                            <td>
                                <input type="text" name="marketprice">
                            </td>
                            <td>
                                <input type="text" name="trueprice">
                            </td>
                            <td>
                                <input type="text" name="num">
                            </td>
                            <td>
                                <input type="text" name="salesnum">
                            </td>
                            <td>
                                <select name="isshow" class="visi-select">
                                    <option value='' <?=$isshow==''?'selected':''?>>--</option>
                                    <option value="10" <?=$isshow=='10'?'selected':''?>>是</option>
                                    <option value="1" <?=$isshow=='1'?'selected':''?>>否</option>
                                </select>
                            </td>
                            <td>
                                <select name="istime" class="visi-select">
                                    <option value="" <?=$istime==''?'selected':''?>>--</option>
                                    <option value="10" <?=$istime=='10'?'selected':''?>>是</option>
                                    <option value="1" <?=$istime=='1'?'selected':''?>>否</option>
                                </select>
                            </td>
                            <td>
                                <select name="isrecommend" class="visi-select">
                                    <option value="" <?=$isrecommend==''?'selected':''?>>--</option>
                                    <option value="10" <?=$isrecommend==='10'?'selected':''?>>是</option>
                                    <option value="1" <?=$isrecommend==='1'?'selected':''?>>否</option>
                                </select>
                            </td>
                            <td>
                                <select name="isbanner" class="visi-select">
                                    <option value="" <?=$isbanner==''?'selected':''?>>--</option>
                                    <option value="10" <?=$isbanner==='10'?'selected':''?>>是</option>
                                    <option value="1" <?=$isbanner==='1'?'selected':''?>>否</option>
                                </select>
                            </td>

                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <input type="submit" value="查找" style="display:none">
                            </td>
                            <td></td>
                        </tr>
                        <?=\yii\helpers\Html::endForm();?>

                        <?php foreach ($model as $v):?>
                        <tr>
                            <td>
                                <input class="checkone" type="checkbox" value="<?=$v['id']?>">
                            </td>
                            <td><?=$v['id']?></td>
                            <td><?=$v['title']?></td>
                            <td><?=$v['cate']['name']?></td>
                            <td>￥<?=$v['shopprice']?></td>
                            <td>￥<?=$v['marketprice']?></td>
                            <td>￥<?=$v['trueprice']?></td>
                            <td><?=$v['num']?></td>
                            <td><?=$v['salesnum']!=null?:0?></td>
                            <td><?php if($v['isshow']==10){echo '<a class="label label-success change-status" href="'.Url::to(['goods/upview','id'=>$v['id'],'type'=>'isshow','isshow'=>$v['isshow']]).'" style="color: #fff">上架</a>';}else{echo '<a class="label label-danger change-status" href="'.Url::to(['goods/upview','id'=>$v['id'],'type'=>'isshow','isshow'=>$v['isshow']]).'" style="color: #fff">下架</a>';}?></td>
                            <td><?php if($v['istime']==10){echo '<a class="label label-success change-status" href="'.Url::to(['goods/upview','id'=>$v['id'],'type'=>'istime','istime'=>$v['istime']]).'" style="color: #fff">促销</a>';}else{echo '<a class="label label-danger change-status" href="'.Url::to(['goods/upview','id'=>$v['id'],'type'=>'istime','isshow'=>$v['istime']]).'" style="color: #fff">未促销</a>';}?></td>
                            <td><?php if($v['isrecommend']==10){echo '<a class="label label-success change-status" href="'.Url::to(['goods/upview','id'=>$v['id'],'type'=>'isrecommend','isrecommend'=>$v['isrecommend']]).'" style="color: #fff">推荐</a>';}else{echo '<a class="label label-danger change-status" href="'.Url::to(['goods/upview','id'=>$v['id'],'type'=>'isrecommend','isrecommend'=>$v['isrecommend']]).'" style="color: #fff">未推荐</a>';}?></td>
                            <td><?php if($v['isbanner']==10){echo '<a class="label label-success change-status" href="'.Url::to(['goods/upview','id'=>$v['id'],'type'=>'isbanner','isbanner'=>$v['isbanner']]).'" style="color: #fff">轮播</a>';}else{echo '<a class="label label-danger change-status" href="'.Url::to(['goods/upview','id'=>$v['id'],'type'=>'isbanner','isbanner'=>$v['isbanner']]).'" style="color: #fff">未轮播</a>';}?></td>
                            <td><?=date('Y-m-d H:i',$v['created_at'])?></td>
                            <td><?=date('Y-m-d H:i',$v['updated_at'])?></td>
                            <td>
                                <a class="btn btn-sm btn-default" href="<?=Url::to(['goods/update','id'=>$v['id']])?>"><i class="fa fa-pencil"></i>&nbsp;修改</a>
                                <a class="btn btn-sm btn-default goods-del"  href="<?=Url::to(['goods/delone','id'=>$v['id']])?>"><i class="fa fa-trash-o"></i>&nbsp;删除</a>
                            </td>
                        </tr>
                        <?php endforeach;?>

                        </tbody>
                 </table>
                </div>
                    <?=\yii\widgets\LinkPager::widget(['pagination'=>$pages])?>
            </section>
        </div>
    </div>
</div>
