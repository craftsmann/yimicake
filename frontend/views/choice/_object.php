<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Object::find()->joinWith('catename')->where(['name'=>'蛋糕'])->asArray()->all();
?>
<a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>isset($_GET['value'])?$_GET['value']:'','material'=>isset($_GET['material'])?$_GET['material']:'','design'=>isset($_GET['design'])?$_GET['design']:'','object'=>''])?>" <?=($_GET['object']==='')?'class="hover"':'';?>>不限</a>
<?php foreach($data as $v):?>
    <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>isset($_GET['value'])?$_GET['value']:'','material'=>isset($_GET['material'])?$_GET['material']:'','design'=>isset($_GET['design'])?$_GET['design']:'','object'=>$v['id']])?>" <?=($_GET['object']===$v['id'])?'class="hover"':'';?>><?='送'.$v['oname']?></a>
<?php endforeach;?>
