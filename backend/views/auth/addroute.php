<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AppAsset;

AppAsset::addCss($this,'@web/static/css/app.css');
$this->title="路由添加";

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
            <li class="active">路由添加</li>
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
                         <?php
                            switch ($type){
                                case 1:
                                    echo '顶级路由添加';
                                    break;
                                case 2:
                                    echo '二级路由添加';
                                    break;
                                default :
                                    echo '路由添加';
                                    break;
                            }
                         ?>
                     </header>
                     <div class="panel-body">
                         <form class="form-horizontal" role="form" action="" method="post">
                             <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken?>">
                             <input type="hidden" name="AuthForm[pid]" value="<?=$pid?>">
                             <div class="form-group">
                                 <label class="col-lg-3 col-sm-3 control-label">路由</label>
                                 <div class="col-lg-9">
                                     <div class="iconic-input">
                                         <i class="fa fa-link"></i>
                                         <input type="text" class="form-control" name="AuthForm[name]" placeholder="例如:/admin/user">
                                         <?=Html::error($model,'name',['class'=>'ad-error'])?>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-lg-3 col-sm-3 control-label">名称</label>
                                 <div class="col-lg-9">
                                     <div class="iconic-input">
                                         <textarea class="form-control" name="AuthForm[description]" placeholder="例如：管理员添加"></textarea>
                                         <?=Html::error($model,'description',['class'=>'ad-error'])?>
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group">

                                 <div class="col-lg-2 pull-right">
                                         <input type="submit" value="提交" class="btn btn-block btn-success">
                                 </div>
                                 <div class="col-lg-2 pull-right">
                                     <a class="btn btn-block btn-primary" href="<?=Url::to(['auth/route'])?>">返回</a>
                                 </div>
                             </div>

                         </form>
                     </div>
                 </section>
             </div>
         </div>
    </div>
</div>

