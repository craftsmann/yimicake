<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Object::find()->joinWith('catename')->where(['name'=>'蛋糕'])->asArray()->all();
?>
<a href="" class="hover">不限</a>
<?php foreach($data as $v):?>
    <a href=""><?='送'.$v['oname']?></a>
<?php endforeach;?>
