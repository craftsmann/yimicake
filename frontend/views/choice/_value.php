<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Value::find()->joinWith('catename')->where(['name'=>'蛋糕'])->asArray()->all();
?>
<a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>'','material'=>isset($_GET['material'])?$_GET['material']:'','design'=>isset($_GET['design'])?$_GET['design']:'','object'=>isset($_GET['object'])?$_GET['object']:''])?>" <?=($_GET['value']==='')?'class="hover"':'';?>>不限</a>
<?php foreach($data as $v):?>
    <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>$v['id'],'material'=>isset($_GET['material'])?$_GET['material']:'','design'=>isset($_GET['design'])?$_GET['design']:'','object'=>isset($_GET['object'])?$_GET['object']:''])?>" <?=($_GET['value']===$v['id'])?'class="hover"':'';?>><?=$v['vname'].'蛋糕'?></a>
<?php endforeach;?>

