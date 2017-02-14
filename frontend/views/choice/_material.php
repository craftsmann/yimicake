<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Material::find()->joinWith('catename')->where(['name'=>'蛋糕'])->asArray()->all();
?>
   <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>isset($_GET['value'])?$_GET['value']:'','material'=>'','design'=>isset($_GET['design'])?$_GET['design']:'','object'=>isset($_GET['object'])?$_GET['object']:'',])?>"  <?=($_GET['material']==='')?'class="hover"':'';?>>不限</a>
<?php foreach($data as $v):?>
   <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>isset($_GET['value'])?$_GET['value']:'','material'=>$v['id'],'design'=>isset($_GET['design'])?$_GET['design']:'','object'=>isset($_GET['object'])?$_GET['object']:'',])?>" <?=($_GET['material']===$v['id'])?'class="hover"':'';?>><?=$v['mname'].'蛋糕'?></a>
<?php endforeach;?>
