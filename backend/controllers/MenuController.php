<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;


use backend\models\MenuForm;
use common\helpers\FormatArray;
use common\models\Menu;
use Yii;
use yii\base\Exception;
use yii\data\Pagination;
use yii\web\Response;


class MenuController extends BaseController
{
    /**
     * 展示后台menu
     * @return string
     */
    public function actionList(){
        //获取参数和innerJoin时候添加表前缀
        $query   = Menu::find()->filterWhere([
            Menu::tableName().'.type'=>1,
            Menu::tableName().'.name'=>Yii::$app->request->post('name'),
            Menu::tableName().'.route'=>Yii::$app->request->post('route'),
            Menu::tableName().'.order'=>Yii::$app->request->post('order'),
            Menu::tableName().'.visiable'=>Yii::$app->request->post('visiable'),
        ]);
        $countQuery= clone $query;
        $pages = new Pagination(['totalCount'=>$countQuery->count(),'pageSize' =>7]);
        $models = $query->joinWith('subMenu')->offset($pages->offset)
                  ->limit($pages->limit)
                  ->all();
        $visiable = Yii::$app->request->post('visiable')!==''?Yii::$app->request->post('visiable'):'';
        return $this->render('list',[
            'models' =>$models,
            'pages'  =>$pages,
            'visiable'=>$visiable
        ]);
    }

    //更新状态
    public function actionUpview(){
        $success = ['status'=>'success','msg'=>'修改成功'];
        $error = ['status'=>'error','msg'=>'添加出错,请检查字段'];
        if(Yii::$app->request->isGet){
            $id = Yii::$app->request->get('id');
            $visi = Yii::$app->request->get('visiable');
            if($visi == 1){
                Menu::updateAll(['visiable'=>2],'id='.(int)$id.'');
            }else{
                Menu::updateAll(['visiable'=>1],'id='.(int)$id.'');
            }
            return json_encode($success);
        }
        return json_encode($error);
    }

    /**
     * 添加后台menu
     * @return string
     */
    public function actionAdd(){

        $this->layout = false;
        $model = new MenuForm();
        $model->setScenario('add');
        $arr = Menu::find()->where(['type'=>1])->asArray()->all();
        $new= FormatArray::getFormat($arr);


        if(Yii::$app->request->isPost){

            if($model->load(Yii::$app->request->post()) && $model->addHandle(1)){

                $success = ['status'=>'success','msg'=>'修改成功'];
                return json_encode($success);
            }else{
                $error = ['status'=>'error','msg'=>'添加出错,请检查字段'];
                return json_encode($error);
            }
        }
        return $this->render('add',['arr'=>$new]);
    }

    /**
     * 更新后台menu
     * @return string
     */
    public function actionUpdate(){
        $this->layout = false;

        $model = new MenuForm();
        $model->setScenario('add');
        $arr = Menu::find()->where(['type'=>1])->asArray()->all();
        $new= FormatArray::getFormat($arr);

        $model = new MenuForm();
        $model->setScenario('update');

        if(Yii::$app->request->isPost){

            if($model->load(Yii::$app->request->post()) && $model->updateHandle()){

                $success = ['status'=>'success','msg'=>'修改成功'];
                return json_encode($success);
            }else{
                $error = ['status'=>'error','msg'=>'更新出错,请检查字段'];
                return json_encode($error);
            }
        }

        return $this->render('update',['arr'=>$new]);
    }

    /**
     * 删除后台menu
     */
    public function actionDel(){
        Yii::$app->response->format=Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');
        $list  = Menu::find()->where(['id'=>(int)$id,'type'=>1])->one();
        if($list->delete()){
            return ['status'=>1,'msg'=>"删除成功"];
        }else{
            return ['status'=>0,'msg'=>"删除失败"];
        }
    }


    /**
     * 删除所有
     * @return array
     */
    public function actionDelall(){
        Yii::$app->response->format=Response::FORMAT_JSON;
        $success = ['status'=>1,'msg'=>"删除成功"];
        $error   = ['status'=>0,'msg'=>"删除失败"];
        if(Yii::$app->request->isPost){
            $ids = Yii::$app->request->post('id');
            $list = explode(',',$ids);
            $trans = Yii::$app->db->beginTransaction();
            try{
                foreach ($list as $v){
                    Menu::deleteAll(['id'=>$v]);
                }
                $trans->commit();
            }catch (Exception $e){
                $trans->rollBack();
                return $error;
            }
            return $success;
        }
        return $error;
    }

    /**
     * 前台menu
     */
    public function actionFlist(){
        //获取参数和innerJoin时候添加表前缀
        $query   = Menu::find()->filterWhere([
            Menu::tableName().'.type'=>2,
            Menu::tableName().'.name'=>Yii::$app->request->get('name'),
            Menu::tableName().'.route'=>Yii::$app->request->get('route'),
            Menu::tableName().'.order'=>Yii::$app->request->get('order'),
        ]);
        $countQuery= clone $query;
        $pages = new Pagination(['totalCount'=>$countQuery->count(),'pageSize' =>7]);
        $models = $query->joinWith('subMenu')->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('flist',[
            'models' =>$models,
            'pages'  =>$pages
        ]);
    }

    /**
     * 添加前台menu
     * @return string
     */
    public function actionFadd(){

        $this->layout = false;
        $model = new MenuForm();
        $model->setScenario('add');
        $arr = Menu::find()->where(['type'=>2])->asArray()->all();
        $new= FormatArray::getFormat($arr);


        if(Yii::$app->request->isPost){

            if($model->load(Yii::$app->request->post()) && $model->addHandle(2)){

                $success = ['status'=>'success','msg'=>'修改成功'];
                return json_encode($success);
            }else{
                $error = ['status'=>'error','msg'=>'添加出错,请检查字段'];
                return json_encode($error);
            }
        }
        return $this->render('fadd',['arr'=>$new]);
    }

    /**
     * 删除menu
     */
    public function actionFdel(){
        Yii::$app->response->format=Response::FORMAT_JSON;
        $id = Yii::$app->request->get('id');
        $list  = Menu::find()->where(['id'=>(int)$id,'type'=>2])->one();
        if($list->delete()){
            return ['status'=>1,'msg'=>"删除成功"];
        }else{
            return ['status'=>0,'msg'=>"删除失败"];
        }
    }

    /**
     * 更新前台menu
     * @return string
     */
    public function actionFupdate(){
        $this->layout = false;

        $model = new MenuForm();
        $model->setScenario('add');
        $arr = Menu::find()->where(['type'=>2])->asArray()->all();
        $new= FormatArray::getFormat($arr);

        $model = new MenuForm();
        $model->setScenario('update');

        if(Yii::$app->request->isPost){

            if($model->load(Yii::$app->request->post()) && $model->updateHandle()){

                $success = ['status'=>'success','msg'=>'修改成功'];
                return json_encode($success);
            }else{
                $error = ['status'=>'error','msg'=>'更新出错,请检查字段'];
                return json_encode($error);
            }
        }

        return $this->render('update',['arr'=>$new]);
    }
}