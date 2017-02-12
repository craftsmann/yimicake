<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */

namespace frontend\controllers;


use common\models\Credit;
use yii\data\Pagination;

class CreditController extends BaseController
{
    public function actionList(){

        if(\Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        $query = Credit::find()->where(['uid'=>\Yii::$app->user->identity->id])->orderBy(['created_at'=>SORT_DESC])->asArray();

        $pages = new Pagination(['totalCount'=>$query->count(),'pageSize'=>5]);

        $model = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('list',['model'=>$model,'pages'=>$pages]);
    }

}