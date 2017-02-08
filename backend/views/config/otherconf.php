<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use yii\helpers\Url;
use yii\helpers\Html;


$js ='
//添加
  $("#conf-ad").on("click",function(ev){
      ev.preventDefault();
     
      layer.open({
         type:2,
         title:"添加菜单",
         area:["600px","600px"],
         content:"'.Url::to(['config/addconf']).'"
      });    
   });
   $(".nav-tabs>li").eq(2).addClass("active").siblings().removeClass("active");
   ';
$this->registerJS($js,\yii\web\View::POS_END);
?>
<div class="page-heading">
    <h4>其他配置</h4>
    <ul class="breadcrumb">
        <li>
            <span class="fa fa-home" aria-hidden="true"></span>
            <a href="<?=Url::to(['index/index'])?>">首页</a>
        </li>
        <li>
            <a href="<?=Url::to(['webconf'])?>">配置管理</a>
        </li>
        <li class="active">添加配置</li>
    </ul>
</div>
<div class="wrapper">
    <div class="col-lg-12">
        <header class="panel-heading custom-tab">
            <?= $this->render("_tab");?>
        </header>
        <section class="panel">
            <div class="panel-body">
                <?php echo Html::beginForm(['config/otherconf'],'post',['class'=>'form-horizontal','id'=>'sub-form'])?>
                <?php foreach ($model as $v):?>
                    <div class="form-group">
                        <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label"><?=$v['description']?></label>
                        <div class="col-lg-10">
                            <textarea type="text" class="form-control" name="Conf[name][]"><?=$v['value']?></textarea>
                            <input class="form-control" type="hidden" value="<?= $v['id']?>" name="Conf[id][]">
                        </div>
                    </div>
                <?php endforeach;?>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10 pull-right">
                        <button id="sub-btn" type="submit" class="btn btn-success btn-block">更新</button>
                    </div>
                </div>
                </form>
            </div>
        </section>
    </div>
</div>
