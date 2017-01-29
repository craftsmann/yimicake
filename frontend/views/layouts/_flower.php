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
        <a href="<?=\yii\helpers\Url::to(['choice/flower','war'=>'','obj'=>'','color'=>$v['id'],'mat'=>'','des'=>'','hol'=>''])?>" target="_blank" title="<?=$v['coname']?>"><?=$v['coname']?></a>
    </li>
<?php endforeach;?>

<?php foreach ($holiday as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['choice/flower','war'=>'','obj'=>'','color'=>'','mat'=>'','des'=>'','hol'=>$v['id']])?>" target="_blank" title="<?=$v['hname']?>"><?=$v['hname']?></a>
    </li>
<?php endforeach;?>

<?php foreach ($material as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['choice/flower','war'=>'','obj'=>'','color'=>'','mat'=>$v['id'],'des'=>'','hol'=>''])?>" target="_blank" title="<?=$v['mname']?>"><?=$v['mname']?></a>
    </li>
<?php endforeach;?>

