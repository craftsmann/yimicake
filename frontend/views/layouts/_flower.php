<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */

$color = \common\models\Color::find()->joinWith('catename b')->where(['b.name'=>'鲜花'])->asArray()->all();
$holiday = \common\models\Holiday::find()->joinWith('catename b')->where(['b.name'=>'鲜花'])->asArray()->all();
$material = \common\models\Material::find()->joinWith('catename b')->where(['b.name'=>'鲜花'])->asArray()->all();

?>

<?php foreach ($color as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>$v['id'],'material'=>isset($_GET['material'])?$_GET['material']:'','holiday'=>isset($_GET['holiday'])?$_GET['holiday']:'',])?>" target="_blank" title="<?=$v['coname']?>"><?=$v['coname']?></a>
    </li>
<?php endforeach;?>

<?php foreach ($holiday as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>isset($_GET['color'])?$_GET['color']:'','material'=>isset($_GET['material'])?$_GET['material']:'','holiday'=>$v['id'],])?>"><?=$v['hname']?></a>
    </li>
<?php endforeach;?>

<?php foreach ($material as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['choice/flower','color'=>isset($_GET['color'])?$_GET['color']:'','material'=>$v['id'],'holiday'=>isset($_GET['holiday'])?$_GET['holiday']:'',])?>" target="_blank" title="<?=$v['mname']?>"><?=$v['mname']?></a>
    </li>
<?php endforeach;?>

