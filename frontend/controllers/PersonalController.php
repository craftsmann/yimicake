<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


use frontend\models\UserForm;

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

}