<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use backend\assets\AppAsset;

$this->title="角色添加";


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
            <li class="active">角色添加</li>
        </ul>
    </div>
    <div class="wrapper">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    角色添加
                </header>
                <div class="panel-body">
                    <form action="" method="post">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->csrfToken?>">
                        <div class="box role-box">

                            <?php foreach ($data as $v){?>
                                <dl>
                                    <dt>
                                        <input type="checkbox" name="role[]" value="<?=$v?>" <?=in_array($v,$role)?'checked':''?>><?=$v?>
                                    </dt>
                                </dl>
                            <?php }?>
                        </div>
                        <div class="col-lg-2 pull-right">
                            <input type="submit" value="提交" class="btn btn-block btn-success">
                        </div>
                        <div class="col-lg-2 pull-right">
                            <a class="btn btn-block btn-primary" href="<?=Url::to(['auth/assign'])?>">返回</a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

