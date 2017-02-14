<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
$material = \common\models\Material::find()->joinWith('catename b')->where(['b.name'=>'蛋糕'])->orderBy([\common\models\Material::tableName().'.created_at'=>SORT_DESC])->limit('4')->asArray()->all();
?>
<?php foreach ($material as $v):?>
    <a href="<?=\yii\helpers\Url::to(['choice/cake','value'=>'','material'=>$v['id'],'design'=>'','object'=>'',])?>" target="_blank"><b><?=$v['mname']?></b></a>
<?php endforeach;?>
