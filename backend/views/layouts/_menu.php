<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
use common\models\Menu;
use yii\helpers\Url;
use common\helpers\FormatArray;


$sql = Menu::find()->where(['type'=>1,'visiable'=>1])->orderBy('order',SORT_ASC)->asArray()->all();
$menu = FormatArray::getArr($sql);
?>

<!--sidebar nav start-->
<ul class="nav nav-pills nav-stacked custom-nav">
    <?php foreach ($menu as $v):?>
        <li class="menu-list">
            <a href="<?php echo Url::to([$v['route']])?>">
                <i class="<?php $data=json_decode($v['data'],true);if($data){echo $data['icon'];}?>"></i>
                <span><?= $v['name']?></span>
            </a>
            <?php if(count(['child'])!=0):?>
                  <ul class="sub-menu-list">
                      <?php foreach ($v['child'] as $val):?>
                       <li><a href="<?php echo Url::to([$val['route']])?>"><?=$val['name']?></a></li>
                     <?php endforeach;?>
                  </ul>
             <?php endif;?>
        </li>
    <?php endforeach;?>
</ul>
<!--sidebar nav end-->