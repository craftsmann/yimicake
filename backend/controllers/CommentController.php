<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;


use common\models\Comments;
use common\models\Goods;
use yii\base\Exception;
use yii\data\Pagination;
use common\models\User;
use Yii;
use yii\web\Response;

class CommentController extends BaseController
{
    public function actionList(){
        $query = Comments::find()
            ->filterWhere(
                [
                    Comments::tableName().'.id' =>Yii::$app->request->post('id'),
                    'comment'   =>Yii::$app->request->post('comment'),
                    'type'    =>Yii::$app->request->post('type'),
                    'created_at'=>Yii::$app->request->post('created_at'),
                    'updated_at'=>Yii::$app->request->post('updated_at'),
                    User::tableName().'.username'   =>Yii::$app->request->post('username'),
                    User::tableName().'.login_ip'   =>Yii::$app->request->post('login_ip'),
                    Goods::tableName().'.title'   =>Yii::$app->request->post('title'),
                ]
            )
            ->joinWith('goods')
            ->joinWith('users')
            ->asArray();

        $count = clone $query;

        $pages = new Pagination(['totalCount'=>$count->count(),'pageSize'=>\Yii::$app->params['PageSize']]);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $status = Yii::$app->request->post('type')!=='' ? Yii::$app->request->post('type') : '';

        return $this->render('list',['pages'=>$pages,'model'=>$model,'status'=>$status]);
    }

    //审查评论
    public function actionUpview(){

        $id   = (int)Yii::$app->request->get('id');
        $type = (int)Yii::$app->request->get('type');
        $model = Comments::findOne(['id'=>$id]);
        $success = ['status'=>'success','msg'=>'状态修改成功'];
        $error = ['status'=>'error','msg'=>'状态修改失败'];
        switch ($type){
            case 1:
                $model->type=2;
                if($model->save()){
                    return json_encode($success);
                };
                break;
            case 2:
                $model->type=1;
                if($model->save()){
                    return json_encode($success);
                }
                break;
        }
        return json_encode($error);
    }

    //删除评论
    public function actionDel(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $success = ['status'=>'success','msg'=>'删除评论成功'];
        $error = ['status'=>'error','msg'=>'删除评论成功'];
        $id   = (int)Yii::$app->request->get('id');
        $model = Comments::findOne(['id'=>$id]);
        if($model->delete()){
            return $success;
        }
        return $error;
    }

    //修改全部
    public function actionUpall(){
        Yii::$app->response->format=Response::FORMAT_JSON;
        $success = ['status'=>1,'msg'=>"操作成功"];
        $error   = ['status'=>0,'msg'=>"操作失败"];
        if(Yii::$app->request->isPost){
            $ids = Yii::$app->request->post('id');
            $list = explode(',',$ids);
            $trans = Yii::$app->db->beginTransaction();
            try{
                foreach ($list as $v){
                    Comments::updateAll(['type'=>1],'id='.$v.'');
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

}