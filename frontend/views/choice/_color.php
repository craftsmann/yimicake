<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Color::find()->joinWith('catename')->where(['name'=>'鲜花'])->asArray()->all();
?>
    <a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>'','material'=>isset($_GET['material'])?$_GET['material']:'','holiday'=>isset($_GET['holiday'])?$_GET['holiday']:'',])?>" <?=($_GET['color']==='')?'class="hover"':'';?>>不限</a>

<?php foreach($data as $v):?>
    <a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>$v['id'],'material'=>isset($_GET['materail'])?$_GET['material']:'','holiday'=>isset($_GET['holiday'])?$_GET['holiday']:'',])?>" <?=($_GET['color']===$v['id'])?'class="hover"':'';?>><?=$v['coname']?></a>
<?php endforeach;?>