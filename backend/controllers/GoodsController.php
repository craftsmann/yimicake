<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;
use backend\models\CateForm;
use common\helpers\FormatArray;
use common\models\Category;
use common\models\Detail;
use common\models\Goods;
use common\models\Order;
use Yii;


use backend\models\GoodsForm;
use yii\base\Exception;
use yii\data\Pagination;
use yii\db\Query;

class GoodsController extends BaseController
{
    //商品列表
    public function actionList(){
        $query = Goods::find()->filterWhere([
            'id'         =>Yii::$app->request->post('id'),
            'title'      =>Yii::$app->request->post('title'),
            'cateid'     =>Yii::$app->request->post('cateid'),
            'shopprice'  =>Yii::$app->request->post('shopprice'),
            'marketprice'=>Yii::$app->request->post('marketprice'),
            'trueprice'  =>Yii::$app->request->post('trueprice'),
            'num'        =>Yii::$app->request->post('num'),
            'salesnum'   =>Yii::$app->request->post('salesnum'),
            'isshow'     =>Yii::$app->request->post('isshow'),
            'istime'     =>Yii::$app->request->post('istime'),
            'isrecommend'=>Yii::$app->request->post('isrecommend'),
            'isbanner'   =>Yii::$app->request->post('isbanner'),
        ])->joinWith('cate')->orderBy([Goods::tableName().'.created_at'=>SORT_DESC]);
        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(),'pageSize'=>Yii::$app->params['PageSize']]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        $isshow = Yii::$app->request->post('isshow')!==''?Yii::$app->request->post('isshow'):'';
        $istime = Yii::$app->request->post('istime')!==''?Yii::$app->request->post('istime'):'';
        $isrecommend = Yii::$app->request->post('isrecommend')!==''?Yii::$app->request->post('isrecommend'):'';
        $isbanner = Yii::$app->request->post('isbanner')!==''?Yii::$app->request->post('isbanner'):'';
        return $this->render('list',['model'=>$model,'pages'=>$pages,'isshow'=>$isshow,'istime'=>$istime,'isbanner'=>$isbanner,'isrecommend'=>$isrecommend]);
    }

    //修改状态
    public function actionUpview(){
        $success = ['status'=>'success','msg'=>'状态修改成功'];
        $error = ['status'=>'error','msg'=>'状态修改失败'];
        if(Yii::$app->request->isGet){
            $type = Yii::$app->request->get('type');
            switch ($type){
                case 'isshow':
                    $id = Yii::$app->request->get('id');
                    $isshow = Yii::$app->request->get('isshow');
                    if($isshow == 10){
                       Goods::updateAll(['isshow'=>1],'id='.(int)$id.'');
                    }else{
                       Goods::updateAll(['isshow'=>10],'id='.(int)$id.'');
                    };
                    return json_encode($success);
                    break;
                case 'isbanner':
                    $id = Yii::$app->request->get('id');
                    $isbanner = Yii::$app->request->get('isbanner');
                    if($isbanner == 10){
                        Goods::updateAll(['isbanner'=>1],'id='.(int)$id.'');
                    }else{
                        Goods::updateAll(['isbanner'=>10],'id='.(int)$id.'');
                    };
                    return json_encode($success);
                    break;
                case 'isrecommend':
                    $id = Yii::$app->request->get('id');
                    $isrecommend = Yii::$app->request->get('isrecommend');
                    if($isrecommend == 10){
                        Goods::updateAll(['isrecommend'=>1],'id='.(int)$id.'');
                    }else{
                        Goods::updateAll(['isrecommend'=>10],'id='.(int)$id.'');
                    };
                    return json_encode($success);
                    break;
                case 'istime':
                    $id = Yii::$app->request->get('id');
                    $istime = Yii::$app->request->get('istime');
                    if($istime == 10){
                        Goods::updateAll(['istime'=>1],'id='.(int)$id.'');
                    }else{
                        Goods::updateAll(['istime'=>10],'id='.(int)$id.'');
                    };
                    return json_encode($success);
                    break;
            }
        }
        return json_encode($error);
    }



    //商品添加
    public function actionAdd(){

        $model = new GoodsForm();
        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post()) && $model->addHandle()){
                return $this->redirect(['list']);
            }
        }
        return $this->render('add',['model'=>$model]);
    }


    //删除商品
    public function actionDelone(){
        $success = ['status'=>'success','msg'=>'商品删除成功'];
        $error = ['status'=>'error','msg'=>'商品删除失败'];
        $id = Yii::$app->request->get('id');
        $trans  = Yii::$app->db->beginTransaction();
        try{
            $goods = Goods::findOne($id);
            $detail = Detail::findOne($id);
            $file  = $goods->midimg;
            $file1 = $goods->smimg1;
            $file2 = $goods->smimg2;

            if(!$goods->delete()||!$detail->delete()||!unlink(Yii::$app->params['FilePath'].$file)
              || !unlink(Yii::$app->params['FilePath'].$file1)||!unlink(Yii::$app->params['FilePath'].$file2)
            ){
                throw new Exception('删除数据商品出错');
            }
            $trans->commit();
            return json_encode($success);
        }catch (Exception $e){

            $trans -> rollBack();
            return json_encode($error);
        }

    }

    //上下架实现
    public function actionUpshow(){
        $success = ['status'=>'1','msg'=>'全部修改成功'];
        $error = ['status'=>'0','msg'=>'全部修改失败'];
        $type =  Yii::$app->request->get('type');
        $data =  Yii::$app->request->get('data');
        $list = explode(',',$data);
        switch ($type){
            case 'on':
                foreach ($list as $v){
                    Goods::updateAll(['isshow'=>10],'id='.$v.'');
                }
                return json_encode($success);
            case 'up':
                foreach ($list as $v){
                    Goods::updateAll(['isshow'=>1],'id='.$v.'');
                }
                return json_encode($success);
            default:
                return json_encode($error);
        }
    }

    //修改商品
    public function actionUpdate(){

        $id = Yii::$app->request->get('id');

        $model = Goods::find()->where(['id'=>$id])->one();
        $detail = Detail::find()->where(['goods_id'=>$id])->one();
        if(Yii::$app->request->isPost){
            //echo '<pre>';print_r($_POST);echo '</pre>';die();
            $command = Yii::$app->db->createCommand()->update('{{%detail}}', ['content' =>Yii::$app->request->post('Detail')['content']], 'goods_id = '.$id.'')->execute();
            if($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['list']);
            }else{
                echo '<pre>';print_r($model->getErrors());echo '</pre>';die();
            }
        }
        return $this->render('update',['model'=>$model,'id'=>$id]);
    }


    //分类
    public function actionCate(){
        $model = Category::find()->joinWith('childs')->asArray()->all();

        return $this->render('cate',['model'=>$model]);
    }

    //添加分类
    public function actionAddcate(){
        $arr = Category::find()->asArray()->all();
        $new= FormatArray::getFormat($arr);

        $form = new CateForm();
        if(Yii::$app->request->isPost){
            if($form->load(Yii::$app->request->post()) && $form->addHandle()){
                return $this->redirect(['cate']);
            }
        }
        return $this->render('addcate',['arr'=>$new]);
    }

    //更新分类
    public function actionUpdatecate(){
        $id = Yii::$app->request->get('id');
        $arr = Category::find()->asArray()->all();
        $new= FormatArray::getFormat($arr);
        $form = new CateForm();
        $model = Category::find()->where(['id'=>$id])->asArray()->one();
        if(Yii::$app->request->isPost){
            if($form->load(Yii::$app->request->post())&&$form->updateCate()){
                return $this->redirect(['cate']);
            }
        }
        return $this->render('updatecate',['model'=>$model,'arr'=>$new]);
    }

    //删除分类
    public function actionDelcate(){
        $id = Yii::$app->request->get('id');

        $model = Category::findOne(['id'=>$id]);

        $success = ['status'=>'1','msg'=>'删除分类成功'];
        $error = ['status'=>'0','msg'=>'删除分类失败'];

        if($model->delete()){
            return  json_encode($success);
        }else{
            return json_encode($error);
        }

    }

    //订单管理
    public function actionOrder(){
        $order = Order::find()->asArray()->all();
        return $this->render('order',['model'=>$order]);
    }
}
