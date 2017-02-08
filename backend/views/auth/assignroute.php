<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use backend\assets\AppAsset;

AppAsset::addCss($this,'@web/static/css/app.css');
$this->title="权限分配";

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
            <li class="active">权限分配</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    权限分配
                </header>
                <div class="panel-body">
                    <form action="" method="post">
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken?>">
                    <div class="box role-box">

                        <?php foreach ($data as $v){?>
                            <dl>
                                <dt>
                                <h3>
                                   <input type="checkbox" name="route[]" value="<?=$v['name']?>" <?php echo in_array($v['name'],$nodes)?'checked':''?>><?= $v['description']?>
                                </h3>
                                </dt>
                                <?php foreach ($v['child'] as $val):?>
                                    <dd>
                                        <input type="checkbox" <?= in_array($val['name'],$nodes)?'checked':''?> name="route[]" value="<?=$val['name']?>"><span><?=$val['description']?></span>
                                    </dd>
                                <?php endforeach;?>
                            </dl>
                        <?php }?>
                    </div>
                        <div class="col-lg-2 pull-right">
                            <input type="submit" value="提交" class="btn btn-block btn-success">
                        </div>
                        <div class="col-lg-2 pull-right">
                            <a class="btn btn-block btn-primary" href="<?=Url::to(['auth/role'])?>">返回</a>
                        </div>
                   </form>
                </div>
            </section>
        </div>
    </div>
</div>

