<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Value::find()->joinWith('catename')->where(['name'=>'蛋糕'])->asArray()->all();
?>
<a href="" class="hover">不限</a>
<?php foreach($data as $v):?>
    <a href=""><?=$v['vname'].'蛋糕'?></a>
<?php endforeach;?>

