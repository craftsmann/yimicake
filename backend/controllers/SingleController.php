<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;


use common\models\Singlepage;
use Yii;
use yii\web\Response;

class SingleController extends BaseController
{

    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    "imagePathFormat" => "/uploads/article/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径
                    "imageRoot" => Yii::getAlias("@webroot"),
                ],
            ]
        ];
    }

    public function actionList()
    {
        $model = Singlepage::find()->orderBy(['created_at'=>SORT_DESC])->asArray()->all();
        return $this->render('list',['model'=>$model]);
    }

    //查看
    public function actionView(){

        $id = (int)Yii::$app->request->get('id');

        $model = Singlepage::findOne(['id'=>$id]);

        return $this->render('view',['model'=>$model]);
    }
    //添加单页
    public function actionAdd(){

        $model =  new Singlepage();

        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post())&&$model->save()){
                return $this->redirect(['list']);
            }
        }
        return $this->render('add',['model'=>$model]);
    }

    //更新
    public function actionUpdate(){

        $model = Singlepage::findOne(['id'=>(int)Yii::$app->request->get('id')]);

        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post())&&$model->save()){
                return $this->redirect(['list']);
            }
        }

        return $this->render('update',['model'=>$model]);
    }

    //删除单页
    public function actionDel(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $success = ['status'=>'success','msg'=>'删除评论成功'];
        $error = ['status'=>'error','msg'=>'删除评论成功'];
        $id   = (int)Yii::$app->request->get('id');
        $model = Singlepage::findOne(['id'=>$id]);
        if($model->delete()){
            return $success;
        }
        return $error;
    }
}