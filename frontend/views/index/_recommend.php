<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<?php $recommend = \common\models\Goods::find()->where(['istime'=>10,'isshow'=>10])->orderBy(['created_at'=>SORT_DESC])->limit('4')->asArray()->all();?>


<?php foreach ($recommend as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['goods/view','id'=>$v['id']])?>" target="_blank" title="<?=$v['title']?>">
            <img src="<?=Yii::$app->params['CONFIG']['SITE_DOMINNAME'].$v['midimg']?>">
        </a>
    </li>
<?php endforeach;?>
