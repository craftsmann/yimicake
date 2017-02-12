<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


use common\models\Order;
use frontend\models\UserForm;
use yii\data\Pagination;

class PersonalController extends BaseController
{
    public function actionIndex(){
        if(\Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $model = new UserForm();
        if(\Yii::$app->request->isPost){
            if( $model->load(\Yii::$app->request->post()) && $model->updateHandle()){
              return $this->redirect(['index']);
            }
        }
        return $this->render('index',['model'=>$model]);
    }

    public function actionOrder(){
        if(\Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $query = Order::find()->where(['uid'=>\Yii::$app->user->identity->id])->orderBy(['created_at'=>SORT_DESC])->asArray();

        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>5]);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('order',['model'=>$model,'pages'=>$pages]);
    }

}