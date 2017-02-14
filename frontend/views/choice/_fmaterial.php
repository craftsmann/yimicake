<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Material::find()->joinWith('catename')->where(['name'=>'鲜花'])->asArray()->all();
?>
<a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>isset($_GET['color'])?$_GET['color']:'','material'=>'','holiday'=>isset($_GET['holiday'])?$_GET['holiday']:'',])?>" <?=($_GET['material']==='')?'class="hover"':'';?>>不限</a>
<?php foreach($data as $v):?>
   <a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>isset($_GET['color'])?$_GET['color']:'','material'=>$v['id'],'holiday'=>isset($_GET['holiday'])?$_GET['holiday']:'',])?>" <?=($_GET['material']===$v['id'])?'class="hover"':'';?>><?=$v['mname']?></a>

<?php endforeach;?>
