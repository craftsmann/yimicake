<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */

$material = \common\models\Material::find()->joinWith('catename b')->where(['b.name'=>'蛋糕'])->asArray()->limit('10')->all();

$model = \common\models\Design::find()->joinWith('catename b')->where(['b.name'=>'蛋糕'])->asArray()->limit('10')->asArray()->all();

?>
<?php foreach ($model as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>'','obj'=>'','mat'=>'','object'=>'','des'=>$v['id']])?>"  title="<?=$v['moname'].'蛋糕'?>"><?=$v['moname'].'蛋糕'?></a>
    </li>
<?php endforeach;?>

<?php foreach ($material as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>'','obj'=>'','mat'=>'','object'=>'','des'=>$v['id']])?>"  title="<?=$v['mname'].'蛋糕'?>"><?=$v['mname'].'蛋糕'?></a>
    </li>
<?php endforeach;?>

