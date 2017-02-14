<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
?>
<?php $birth = \common\models\Goods::find()->joinWith('value')->where(['isshow'=>10,'istime'=>1,'isbanner'=>1,'vname'=>'祝寿'])->orderBy(['created_at'=>SORT_DESC])->limit('10')->asArray()->all();?>

<?php //echo '<pre>';print_r($birth);echo '</pre>';die();?>
<?php foreach ($birth as $v):?>
    <li>
        <a href="<?=\yii\helpers\Url::to(['goods/view','id'=>$v['id']])?>" target="_blank" title="<?=$v['title']?>">
            <img src="<?=Yii::$app->params['CONFIG']['SITE_DOMINNAME'].$v['midimg']?>">
            <div class="btm-item fl">
                <span class="btm-name"><?=$v['title']?></span>
                <span class="btm-price">￥<?=$v['shopprice']?></span>
            </div>
            <a class="tag" href="<?=\yii\helpers\Url::to(['goods/view','id'=>$v['id']])?>" target="_blank" title="<?=$v['title']?>">立即购买</a>
        </a>
    </li>
<?php endforeach;?>