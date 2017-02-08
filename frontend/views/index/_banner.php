<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
$banner = \common\models\Goods::find()->where(['isbanner'=>10,'isshow'=>10])->orderBy(['created_at'=>SORT_DESC])->limit('3')->all();
?>
<?php foreach ($banner as $v):?>
  <a href="<?=\yii\helpers\Url::to(['goods/view','id'=>$v['id']])?>" target="_blank" title="<?=$v['title']?>">
      <img src="<?='http://localhost/yimicake/frontend/web/'.$v['midimg']?>">
  </a>
<?php endforeach;?>
