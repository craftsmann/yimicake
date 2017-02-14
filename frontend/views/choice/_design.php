<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Design::find()->joinWith('catename')->where(['name'=>'蛋糕'])->asArray()->all();
?>
   <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>isset($_GET['value'])?$_GET['value']:'','material'=>isset($_GET['material'])?$_GET['material']:'','design'=>'','object'=>isset($_GET['object'])?$_GET['object']:'',])?>" <?=($_GET['design']==='')?'class="hover"':'';?>>不限</a>
<?php foreach($data as $v):?>
    <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>isset($_GET['value'])?$_GET['value']:'','material'=>isset($_GET['material'])?$_GET['material']:'','design'=>$v['id'],'object'=>isset($_GET['object'])?$_GET['object']:'',])?>" <?=($_GET['design']===$v['id'])?'class="hover"':'';?>><?=$v['moname'].'蛋糕'?></a>
<?php endforeach;?>