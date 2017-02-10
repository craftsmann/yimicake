<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */

namespace frontend\controllers;


use frontend\models\CommentsForm;

class CommentsController extends BaseController
{
    public function actionAccept(){

        $model = new CommentsForm();
        if(!\Yii::$app->user->isGuest){
            if($model->load(\Yii::$app->request->get()) && $model->addData()){
                echo '评论成功，等待审核';
            }else{
                echo $model->getErrors('content')[0];
            }
        }else{
            echo '请登录后发表评论！';
        }
    }

}