<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 * 购物车数量
*/
//如果是访客
if(Yii::$app->user->isGuest){
    if(Yii::$app->request->cookies->has('YIMICAKE')){
       $cookieval = Yii::$app->request->cookies->getValue('YIMICAKE');
       $val = unserialize(base64_decode($cookieval));
       echo count($val);
    }else{
       echo '0';
    }
}else{
    $num = \common\models\Cart::find()->where(['uid'=>Yii::$app->getUser()->id])->count();
    echo !$num?'0':$num;
}
?>