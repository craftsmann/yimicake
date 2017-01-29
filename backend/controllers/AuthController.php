<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;

use backend\models\AuthForm;
use backend\models\RoleForm;
use common\models\AdminUser;
use common\models\AuthItem;
use Yii;
use yii\base\Exception;
use yii\web\Response;

class AuthController extends BaseController
{
    /**
     * 权限管理
     */
    public function actionRoute(){

        $auth = AuthItem::find()->where(['type'=>2])->orderBy('created_at')->asArray()->all();

        $data = $this->handleArr($auth);


       // $db = Yii::$app->authManager;

//        echo '<pre>';
//        print_r($news);
//        echo '</pre>';die();

        return $this->render('route',['data'=>$data]);
    }


    /**
     * 添加路由
     * @return string
     */
    public function actionAddroute(){
        $model = new AuthForm();
        $model->setScenario('add');
        $type=Yii::$app->request->get('type');
        $pid=Yii::$app->request->get('pid');
        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post()) && $model->handleRouteAdd()){
                Yii::$app->session->setFlash('success','添加成功!');
            }else{
                Yii::$app->session->setFlash('error','添加失败!');
            };
        }
        return $this->render('addroute',['model'=>$model,'type'=>$type,'pid'=>$pid]);
    }

    /**
     * 删除路由
     * @return array
     */
    public function actionDelroute(){

        //返回格式为json
        Yii::$app->response->format=Response::FORMAT_JSON;

        $name = Yii::$app->request->get('name');

        $id = Yii::$app->request->get('id');

        //查找是否含有子节点
        $auth = AuthItem::find()->asArray()->all();

        $data = $this->getChild($auth,$id);

        $auth = Yii::$app->authManager;

        //获取路由
        $permission = $auth->getPermission($name);

        $res1 = ['status'=>1,'msg'=>'删除节点成功'];

        $res2   = ['status'=>2,'msg'=>'未获取到节点'];

        $res3   = ['status'=>3,'msg'=>'该节点有子节点，请先移除子节点'];

        if(!$permission){
           return $res2;
        }elseif (count($data)!=0){
           return $res3;
        }else{
            //移除路由
            if($auth->remove($permission)){
                return $res1;
            }
        }
        return $res2;
    }

    /**
     * 角色管理
     */
    public function actionRole(){

        $data = Yii::$app->authManager->getRoles();

        return $this->render('role',['data'=>$data]);
    }

    /**
     * 添加角色
     * @return string
     */
    public function actionAddrole(){

        $this->layout = false;

        $model = new RoleForm();

        $model->setScenario(RoleForm::SCENARIO_ROLE_ADD);


        if(Yii::$app->request->isPost){


            if($model->load(Yii::$app->request->post()) && $model->addHandle()){
                $success = ['status'=>'success','msg'=>'添加成功'];
                return json_encode($success);
            }else{
                $error = ['status'=>'error','msg'=>'添加出错,请检查字段'];
                return json_encode($error);
            }
        }

        return $this->render('addrole');
    }

    /**
     * 修改角色
     * @return string|Response
     * @throws Exception
     */
    public function actionUprole(){
        //获取展示角色详细
        $name  = Yii::$app->request->get('name');
        $auth  = Yii::$app->authManager;
        $data  = $auth->getRole($name);

        $model = new RoleForm();
        $model->setScenario(RoleForm::SCENARIO_ROLE_UPDATE);

        //存在下级节点
        $child = $auth->getChildren($data->name);

        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post()) && $model->updateHandle($data)){
               return $this->redirect(['auth/role']);
            } elseif($child){
                Yii::$app->session->setFlash('error','修改失败！');
            } else{
                throw new Exception('出现错误，请与管理员联系！');
            }
        }
        return $this->render('uprole',['data'=>$data]);
    }

    /**
     * 删除角色
     * @return array
     * @throws Exception
     */
    public function actionDelrole(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $auth = Yii::$app->authManager;
        $name = Yii::$app->request->post('name');
        $role = $auth->getRole($name);
        $child  = $auth->getChildren($name);
        if(!$role || $child){
            return [
                'status'=>2,
                'message'=>'删除失败，请移除子节点！'
            ];
        }
        if($auth->remove($role)){
            return [
                'status'=>1,
                'message'   =>'删除成功！'
            ];
        }
        throw new Exception('删除异常！');
    }


    /**
     * 分配权限
     * @return string|Response
     * @throws Exception
     */
    public function actionAssignroute(){

        $auth = AuthItem::find()->where(['type'=>2])->orderBy('created_at')->asArray()->all();

        $data = $this->handleArr($auth);




        $name = Yii::$app->request->get('name');

        $manager = Yii::$app->authManager;

        $nodes = $manager->getPermissionsByRole($name);


        $role = $manager->getRole($name);

        if(!$role){
            throw new Exception('分配权限异常！请联系管理员');
        }

        if (Yii::$app->request->isPost){
            $route = Yii::$app->request->post('route');
            $manager->removeChildren($role);
            if(count($route) == 0){
                return $this->redirect(['auth/role']);
            }
            foreach ($route as $v){
                $per = $manager->getPermission($v);
                $manager->addChild($role,$per);
            }
            return $this->redirect(['auth/role']);
        }
        return $this->render('assignroute',['data'=>$data,'nodes'=>array_keys($nodes)]);
    }


    /**
     * 用户展示
     */
    public function actionAssign(){

        $model =AdminUser::find()->asArray()->all();
        return $this->render('assign',['model'=>$model]);

    }

    /**
     * 角色分配
     */
    public function actionAssignrole(){

        $auth  = Yii::$app->authManager;
        $allRoles = $auth->getRoles();
        $id    = Yii::$app->request->get('id');
        $nodes = Yii::$app->request->post('role');
        $res   = AdminUser::findOne((int)$id);

        $roles = $auth->getRolesByUser($id);

        if(Yii::$app->request->isPost){
            if(count($nodes) == 0){
                $auth->revokeAll($id);
                return $this->redirect(['auth/assign']);
            }
            //用户不存在，抛出异常
            if(!$res){
                throw new Exception('用户异常，请联系网站管理员！');
            }
            $auth->revokeAll($id);
            foreach ($nodes as $v){
                $name = $auth->getRole($v);
                if(!$name){continue;}
                $auth->assign($name,$id);
            }
            return $this->redirect(['auth/assign']);
        }
        return $this->render('assignrole',[
            'data'=>array_keys($allRoles),
            'role'=>array_keys($roles)
        ]);
    }


    /**
     * 处理权限节点树状展示
     * @param $arr
     * @param int $pid
     * @return array
     */
    private function handleArr($arr,$pid=0){
        $tempArr = [];
        foreach ($arr as $v){
            if(unserialize($v['data']) == $pid){
                $v['child'] = $this->handleArr($arr,$v['id']);
                $tempArr[] = $v;
            }
        }
        return $tempArr;
    }

    /**
     * 传入权限子节点
     * @param $arr
     * @param $id
     * @return array
     */
    private function getChild($arr,$id){
        $tmpArr=array();
        foreach ($arr as $v){
            if(unserialize($v['data'])==$id){
                $v['child']=$this->getChild($arr,$v['id']);
                $tmpArr[] = $v;
            }
        }
        return $tmpArr;
    }


}