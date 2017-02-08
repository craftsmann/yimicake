<?php


namespace frontend\controllers;
use common\models\Goods;
use Yii;

class GoodsController extends BaseController
{
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $result  = Goods::find()->joinWith('cate')->where([Goods::tableName().'.id'=>$id])->asArray()->all();
      
        return $this->render('view',['res'=>$result]);
    }

}