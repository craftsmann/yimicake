<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Holiday::find()->joinWith('catename')->where(['name'=>'鲜花'])->asArray()->all();
?>
    <a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>isset($_GET['color'])?$_GET['color']:'','material'=>'','holiday'=>'',])?>" <?=($_GET['holiday']==='')?'class="hover"':'';?>>不限</a>
<?php foreach($data as $v):?>
    <a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>isset($_GET['color'])?$_GET['color']:'','material'=>isset($_GET['material'])?$_GET['material']:'','holiday'=>$v['id'],])?>" <?=($_GET['holiday']===$v['id'])?'class="hover"':'';?>><?=$v['hname']?></a>
<?php endforeach;?>