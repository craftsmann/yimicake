<?php


namespace frontend\controllers;
use common\models\Cart;
use common\models\Goods;
use Yii;
use yii\web\Cookie;

class GoodsController extends BaseController
{
    //商品详情
    public function actionView(){
        $id = Yii::$app->request->get('id');
        $result  = Goods::find()->joinWith('cate')->where([Goods::tableName().'.id'=>$id])->asArray()->all();
        return $this->render('view',['res'=>$result]);
    }

    //添加购物车
    public function actionAddcar(){
        $num = Yii::$app->request->get('num');
        $id  = Yii::$app->request->get('id');
        $tmpArr = [];
        $success = ['status'=>'success','message'=>'已经添加至购物车'];
        $error   = ['status'=>'success','message'=>'添加购物车失败,请重试'];
        if(Yii::$app->user->isGuest){
            //不如果存在cookie
            if(!Yii::$app->request->cookies->has('YIMICAKE')){
                $tmpArr[] = ['num'=>$num,'id'=>$id];
                $cookieName = 'YIMICAKE';
                $cookieVal  = base64_encode(serialize($tmpArr));
                Yii::$app->response->cookies->add(new Cookie([
                    'name'  =>$cookieName,
                    'value' =>$cookieVal
                ]));
                return json_encode($success);
            }else{
            //如果存在cookie
               $data =  unserialize(base64_decode(Yii::$app->request->cookies->getValue('YIMICAKE')));
               $tmpID = '';
                foreach ($data as &$v){
                   if($v['id'] == $id){
                       $v['num']=$num;
                   }else{$tmpID = $id;}
               }
                if($tmpID!==''){
                    $data[] = ['num'=>$num,'id'=>$tmpID];
                }
                $cookieVal  = base64_encode(serialize($data));
                Yii::$app->response->cookies->add(new Cookie([
                    'name'  =>'YIMICAKE',
                    'value' =>$cookieVal,
                ]));
                return json_encode($success);
            }
        }else{
            //登录用户数据库存储
            $goods = Cart::findOne(['goods_id'=>$id]);
            $cart  = new Cart();
            //查找不到商品
            if(!$goods){
                $cart->goods_id  = (int)$id;
                $cart->num       = (int)$num;
                $cart->uid       = Yii::$app->getUser()->id;
                return $cart->insert()? json_encode($success):json_encode($error);
            }else{
            //查找到商品
                $goods->num = $num;
                return $cart->save()? json_encode($success):json_encode($error);
            }
        }
    }

}