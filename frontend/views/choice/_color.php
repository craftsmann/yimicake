<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
$data = \common\models\Color::find()->joinWith('catename')->where(['name'=>'鲜花'])->asArray()->all();
?>
    <a href="" class="hover">不限</a>
<?php foreach($data as $v):?>
    <a href=""><?=$v['coname']?></a>
<?php endforeach;?>