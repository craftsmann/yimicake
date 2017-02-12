<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */

namespace frontend\controllers;


use common\models\Cart;
use frontend\models\OrderForm;

class OrderController extends BaseController
{

    public function actionList(){

        $success = ['status'=>'success','message'=>'添加成功'];
        $error   = ['status'=>'error','message'=>'添加出错'];

        $order = new OrderForm();

        $data = Cart::find()->select('goods_id as id,num')->where(['uid'=>\Yii::$app->getUser()->id])->asArray()->all();

        if(\Yii::$app->request->isPost){
            if($order->load(\Yii::$app->request->post()) && $order->addData()){

                return $this->redirect(['index/index']);
            }else{
                echo '<pre>';print_r('出现错误');echo '</pre>';die();
            }
        }
        return $this->render('list',['order'=>$order,'cart'=>$data]);

    }

}