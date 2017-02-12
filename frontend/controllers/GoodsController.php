<?php


namespace frontend\controllers;
use common\models\Cart;
use common\models\Comments;
use common\models\Goods;
use frontend\models\CommentsForm;
use Yii;
use yii\data\Pagination;
use yii\web\Cookie;

class GoodsController extends BaseController
{
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
            ]
        ];
    }


    public function actionView(){


        $id = Yii::$app->request->get('id');
    //获取商品
        $result  = Goods::find()->joinWith('cate')->joinWith('con')->where([Goods::tableName().'.id'=>$id])->asArray()->all();
    //获取评论
        $query    = Comments::find()->where([Comments::tableName().'.type'=>1,'goods_id'=>(int)$id])
                   ->joinWith('users')
                   ->joinWith('goods')
                   ->asArray();
        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>'10']);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $data  = new CommentsForm();



       //echo '<pre>';print_r($model);echo '</pre>';die();

        return $this->render('view',[
             'res'    =>$result,
             'comment'=>$model,
             'pages'  =>$pages,
             'data'   =>$data,
             'goods_id'=>$id
        ]);
    }

    //购物车列表
    public function actionShopcar(){
        //是否游客
        if(Yii::$app->user->isGuest){
            //cookie是否存在
            if(Yii::$app->request->cookies->has('YIMICAKE')){
                $cookieval = Yii::$app->request->cookies->getValue('YIMICAKE');
                $data = unserialize(base64_decode($cookieval));
                //echo '<pre>';print_r($data);echo '</pre>';die();
            }else{
                $data = '';
            }
        }else{

            $data = Cart::find()->select('goods_id as id,num')->where(['uid'=>Yii::$app->getUser()->id])->asArray()->all();


        }
        return $this->render('shopcar',['model'=>$data]);
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
               unset($_COOKIE['YIMICAKE']);
               $tmpID = '';
               $tmparr=[];
                foreach ($data as &$v){
                   if($v['id'] == $id){
                       $v['num']=$num;
                   }
                   array_push($tmparr,$v['id']);
               }
               //var_dump($tmparr);die();
               if(!in_array($id,$tmparr)){
                   $data[] = ['num'=>$num,'id'=>$id];
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
            //查找不到商品
            if(!$goods){
                $cart  = new Cart();
                $cart->goods_id  = (int)$id;
                $cart->num       = (int)$num;
                $cart->uid       = Yii::$app->getUser()->id;
                return $cart->insert()? json_encode($success):json_encode($error);
            }else{
            //查找到商品
                $goods->num = $num;
                return $goods->save()? json_encode($success):json_encode($error);
            }
        }
    }

    //操作购物车
    public function actionOprater(){

        $id   = Yii::$app->request->get('id');
        $type = Yii::$app->request->get('type');
        $success = ['status'=>'success','message'=>'操作成功'];
        $error   = ['status'=>'success','message'=>'操作失败,请重试'];
        //判断访客
        if(Yii::$app->user->isGuest){
            $data = unserialize(base64_decode(Yii::$app->request->cookies->getValue('YIMICAKE')));
            unset($_COOKIE['YIMICAKE']);
            //添加
            if($type == 'add'){
                foreach ($data as &$v){
                    if($v['id']==$id){
                        $v['num'] +=1;
                    }
                }
                $cookieVal  = base64_encode(serialize($data));
                Yii::$app->response->cookies->add(new Cookie([
                    'name'  =>'YIMICAKE',
                    'value' =>$cookieVal,
                ]));
                return json_encode($success);
            }else{
                //减少
                if($type == 'reduce'){
                    foreach ($data as &$v){
                        if($v['id']==$id){
                            $v['num']=$v['num']<=1?1:$v['num']-1;
                        }
                    }
                    $cookieVal  = base64_encode(serialize($data));
                    Yii::$app->response->cookies->add(new Cookie([
                        'name'  =>'YIMICAKE',
                        'value' =>$cookieVal,
                    ]));
                    return json_encode($success);
            }
         }
        }else{
            $goods = Cart::find()->where(['uid'=>Yii::$app->getUser()->id,'goods_id'=>$id])->one();
            //增加
            if($type == 'add'){
                //操作数据库
                $goods->num +=1;
                //echo '<pre>';print_r($goods);echo '</pre>';die();
                return $goods->save()?json_encode($success):json_encode($error);
            }else{
            //减少
                if($goods->num <=1 ){
                    $goods->num = 1;
                }else{
                    $goods->num -=1;
                }
                $goods->save();
                return $goods->save()?json_encode($success):json_encode($error);
            }
        }
        return json_decode($error);
    }

    //清除购物车
    public function actionClear(){
        $id   = Yii::$app->request->get('id');
        $type = Yii::$app->request->get('type');
        $success = ['status'=>'success','message'=>'清除成功'];
        $error   = ['status'=>'success','message'=>'清除失败,请重试'];
        //游客
        if(Yii::$app->user->isGuest){
            $data = unserialize(base64_decode(Yii::$app->request->cookies->getValue('YIMICAKE')));
            unset($_COOKIE['YIMICAKE']);
            //var_dump($data);die();
            //清除单个
            if($type=='one'){
                foreach ($data as $k=>&$v){
                    if($v['id'] == $id){
                        unset($data[$k]);
                    }
                }
                $cookieVal  = base64_encode(serialize($data));
                Yii::$app->response->cookies->add(new Cookie([
                    'name'  =>'YIMICAKE',
                    'value' =>$cookieVal,
                ]));
                return json_encode($success);
            }
            //清除全部
            if($type=='all'){
                Yii::$app->response->cookies->remove('YIMICAKE');
                return json_encode($success);
            }
        }else{

            if($type == 'one'){
               $data = Cart::find()->where(['uid'=>Yii::$app->getUser()->id,'goods_id'=>$id])->one();
               return !$data->delete()?json_encode($error):json_encode($success);
            }
            if($type=='all'){
                //会员
                $data = Cart::deleteAll(['uid'=>Yii::$app->getUser()->id]);
                if($data){
                    return !$data?json_encode($error):json_encode($success);
                }
            }
        }
        return json_encode($error);

    }
}