<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
$css = '.help-block{color:red}';
$this->registerCss($css);
$this->title  = "角色修改";
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
            <li class="active">角色修改</li>
        </ul>
    </div>
    <?php
    if(Yii::$app->session->hasFlash('success')){
        echo '<div class="alert alert-success fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>'.Yii::$app->session->getFlash("success").'</strong>你可以点击选择继续添加或者<a href="'.Url::to(["auth/route"]).'">返回</a>
                </div>';
    }
    if(Yii::$app->session->hasFlash('error')){
        echo '<div class="alert alert-block alert-danger fade in">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>'.Yii::$app->session->getFlash("error").'</strong>请重新尝试或者<a href="'.Url::to(["auth/route"]).'">返回</a>
                </div>';
    }
    ?>
    <div class="wrapper">
        <div class="row">
            <div class="col-lg-8">
                <section class="panel">
                    <header class="panel-heading">
                        角色修改
                    </header>
                    <div class="panel">
                        <div class="panel-body">
                            <?php echo Html::beginForm('','post',['class'=>'form-horizontal','id'=>'sub-form'])?>

                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">角色</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="RoleForm[name]" value="<?=$data->name?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">描述</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="RoleForm[description]"><?=$data->description?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-2 pull-right">
                                    <input type="submit" value="提交" class="btn btn-block btn-success">
                                </div>
                                <div class="col-lg-2 pull-right">
                                    <a class="btn btn-block btn-primary" href="<?=Url::to(['auth/role'])?>">返回</a>
                                </div>
                            </div>
                            <?php Html::endForm();?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>