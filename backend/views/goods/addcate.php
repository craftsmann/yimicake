<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$css = '.help-block{color:red}';
$this->registerCss($css);
$this->title="分类添加";
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
            <li class="active">分类添加</li>
        </ul>
    </div>
    <div class="wrapper">
    <div class="col-sm-12">
    <section class="panel">
        <div class="panel-body">
            <?php echo Html::beginForm(['goods/addcate'],'post',['class'=>'form-horizontal','id'=>'sub-form'])?>

            <div class="form-group">
                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">名称</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="CateForm[name]" placeholder="分类名称">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">父级</label>
                <select id="select" name="CateForm[pid]" class="form-control m-bot15" style="margin-left: 195px;width: 80%">
                    <option value="0">---请选择父级----</option>
                    <?php foreach ($arr as $v):?>

                        <option  value="<?=$v['id']?>"><?=$v['format'].$v['name']?></option>
                    <?php endforeach;?>

                </select>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-sm-2 control-label">描述</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="CateForm[description]" placeholder="描述">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10 pull-right">
                    <button id="sub-btn" type="submit" class="btn btn-success">添加</button>
                </div>
            </div>
            <?php Html::endForm();?>
        </div>
    </section>
    </div>
    </div>
</div>