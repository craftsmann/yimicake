<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;


use common\models\Suggest;
use yii\base\Exception;
use yii\data\Pagination;
use Yii;
use yii\web\Response;

class SuggestController extends BaseController
{
    public function actionList(){

        $query = Suggest::find()
            ->filterWhere(
                [
                    'id' =>Yii::$app->request->post('id'),
                    'content'   =>Yii::$app->request->post('content'),
                    'type'    =>Yii::$app->request->post('type'),
                    'created_at'=>Yii::$app->request->post('created_at'),
                    'updated_at'=>Yii::$app->request->post('updated_at'),
                    'nickname'   =>Yii::$app->request->post('username'),
                    'email'   =>Yii::$app->request->post('email'),
                    'oprater'   =>Yii::$app->request->post('oprater'),
                ]
            )
            ->orderBy(['created_at'=>SORT_DESC])
            ->asArray();

        $count = clone $query;

        $pages = new Pagination(['totalCount'=>$count->count(),'pageSize'=>\Yii::$app->params['PageSize']]);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        $status = Yii::$app->request->post('type')!=='' ? Yii::$app->request->post('type') : '';

        return $this->render('list',['model'=>$model,'pages'=>$pages,'status'=>$status]);
    }

    //删除反馈
    public function actionDel(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $success = ['status'=>'success','msg'=>'删除评论成功'];
        $error = ['status'=>'error','msg'=>'删除评论成功'];
        $id   = (int)Yii::$app->request->get('id');
        $model = Suggest::findOne(['id'=>$id]);
        if($model->delete()){
            return $success;
        }
        return $error;
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
                    Suggest::deleteAll(['id'=>$v]);
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