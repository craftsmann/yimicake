<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<?php $time = \common\models\Goods::find()->where(['isrecommend'=>10,'isshow'=>10])->orderBy(['created_at'=>SORT_DESC])->limit('6')->asArray()->all();?>


<?php foreach ($time as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['goods/view','id'=>$v['id']])?>" target="_blank" title="<?=$v['title']?>">
            <img src="<?=Yii::$app->params['CONFIG']['SITE_DOMINNAME'].$v['midimg']?>">
            <div class="time-price">
                <b>￥<?=$v['shopprice']?></b>
                <del>￥<?=$v['marketprice']?></del>
            </div>
            <div class="time-words">
               <?=$v['words']?>
            </div>
        </a>
    </li>
<?php endforeach;?>