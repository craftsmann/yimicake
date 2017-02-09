<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */
if($model !== ''){
    $tmpArr = [];
    foreach ($model as $v){
        $arr = \common\models\Goods::find()->where(['id'=>$v['id']])->asArray()->all();
        $arr[0]['gnum'] =$v['num'];
        array_push($tmpArr,$arr);
    }
?>
<?php foreach ($tmpArr as $dataarr):?>
    <?php foreach ($dataarr as $v):?>
        <tr>
            <td><img src="<?=$v['smimg1']?>" title="<?=$v['title']?>"></td>
            <td><h3><a href="<?=\yii\helpers\Url::to(['goods/view','id'=>$v['id']])?>" title="<?=$v['title']?>"><?=$v['title']?></a></h3></td>
            <td><?=$v['shopprice']?>元</td>
            <td>
                <input value="-" type="button"><input value="<?=$v['gnum']?>" style="width: 20px;text-align: center" readonly><input value="+" type="button">
            </td>
            <td><span style="color: #ed145b;font-size: 15px"><?=intval($v['shopprice'])*intval($v['gnum'])?></span>元</td>
            <td><a href="">删除</a></td>
        </tr>
    <?php endforeach;?>
<?php endforeach;?>
<?php
}else{
    echo '<strong>购物车空空如也！</strong>';
}
?>