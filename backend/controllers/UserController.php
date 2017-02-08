<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;


use backend\models\UserForm;
use common\models\AdminUser;
use Yii;
use yii\base\Exception;
use yii\base\Response;
use yii\data\Pagination;
use yii\db\Query;

class UserController extends BaseController
{
    /**
     * 用户自定义设置
     * @return string
     */
    public function actionSet(){

        $this->layout = false;

        $model = new UserForm();
        //设置场景
        $model->setScenario(UserForm::SCENARIO_LOGIN_USER);
        if(Yii::$app->request->isPost){
           if($model->load(Yii::$app->request->post()) && $model->dataHandle()){
               $success = ['status'=>'success','msg'=>'修改成功'];
               return json_encode($success);
           }else{
               $error = ['status'=>'error','msg'=>'修改失败'];
               return json_encode($error);
           }
        }
        return $this->render('set',['model'=>$model]);
    }


    /**
     * 后台用户列表
     * @return string
     */
    public function actionList(){
        $query = AdminUser::find()->filterWhere([
            'username'    =>Yii::$app->request->post('name'),
            'email'   =>Yii::$app->request->post('email'),
            'sex'     =>Yii::$app->request->post('sex'),
            'qq'      =>Yii::$app->request->post('qq'),
            'phone'   =>Yii::$app->request->post('phone'),
            'status'  =>Yii::$app->request->post('status'),
            'login_ip'=>Yii::$app->request->post('login_ip'),
        ]);
        $count =clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(),'pageSize'=>Yii::$app->params['PageSize']]);
        $model = $query
                ->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        $sex = Yii::$app->request->post('sex')!==''?Yii::$app->request->post('sex'):'';
        $status = Yii::$app->request->post('status')!==''?Yii::$app->request->post('status'):'';

        return $this->render('list',['model'=>$model,'pages'=>$pages,'sex'=>$sex,'status'=>$status]);
    }

    /**
     * 添加用户
     * @return string
     */
    public function actionAdd(){
        $this->layout = false;
        $user = AdminUser::find()->orderBy('id')->asArray()->all();

        $model = new UserForm();
        //设置场景
        $model->setScenario(UserForm::SCENARIO_ADD_USER);
        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post()) && $model->addHandle()){
                $success = ['status'=>'success','msg'=>'添加成功'];
                return json_encode($success);
            }else{
                $error = ['status'=>'error','msg'=>'添加失败，请更换用户名或邮箱并检查字段提交'];
                return json_encode($error);
            }
        }

        return $this->render('add',['model'=>$user]);
    }

    /**
     * 删除单个用户
     * @return array
     */
    public function actionDel(){
        Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        $success = ['status'=>1,'msg'=>"删除成功"];
        $error   = ['status'=>0,'msg'=>"删除失败"];
        $id = Yii::$app->request->get('id');
        $list  = AdminUser::find()->where(['id'=>(int)$id])->one();

        if($id==Yii::$app->params['SuperId']){
            return $error;
        }
        if( $list->delete()){
                return $success;
        }else{
                return $error;
        }
    }

    /**
     * 删除所有
     * @return array
     */
    public function actionDelall(){
        Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
        $success = ['status'=>1,'msg'=>"删除成功"];
        $error   = ['status'=>0,'msg'=>"删除失败"];
        if(Yii::$app->request->isPost){
            $ids = Yii::$app->request->post('id');
            $list = explode(',',$ids);
            $trans = Yii::$app->db->beginTransaction();
            try{
                foreach ($list as $v){
                    if($v==Yii::$app->params['SuperId']){
                        return $error;
                    }
                    AdminUser::deleteAll(['id'=>$v]);
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
     * 更新用户
     * @return string
     */
    public function actionUpdate(){
        $this->layout = false;
        $pk = Yii::$app->request->get('id');
        $model = AdminUser::find()->where(['id'=>$pk])->one();

        $user = new UserForm();
        //设置场景
        $user->setScenario(UserForm::SCENARIO_UPDATE_USER);

        if(Yii::$app->request->isPost){
            if($user->load(Yii::$app->request->post()) && $user->updateHandle()){
                $success = ['status'=>'success','msg'=>'修改成功'];
                return json_encode($success);
            }else{
                $error = ['status'=>'error','msg'=>'修改失败'];
                return json_encode($error);
            }
        }

        return $this->render('update',['model'=>$model]);
    }

    /**
     * 修改用户状态
     * @return string
     */
    public function actionUpstatus(){
        $success = ['status'=>'success','msg'=>'修改成功'];
        $error = ['status'=>'error','msg'=>'添加出错,请检查字段'];
        if(Yii::$app->request->isGet){
            $id = Yii::$app->request->get('id');
            $status = Yii::$app->request->get('status');
            if($id==Yii::$app->params['SuperId']){
                return json_encode($error);
            }
            if($status == 10){
                AdminUser::updateAll(['status'=>0],'id='.(int)$id.'');
            }else{
                AdminUser::updateAll(['status'=>10],'id='.(int)$id.'');
            }
            return json_encode($success);
        }
        return json_encode($error);
    }
}