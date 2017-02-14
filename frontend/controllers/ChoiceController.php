<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


use common\models\Goods;
use yii\data\Pagination;

class ChoiceController extends BaseController
{

    public function actionList(){

        return $this->render('list');
    }

    public function actionCake(){
        $get = \Yii::$app->request;
        $query = Goods::find()->filterWhere([
            'name'=>'蛋糕',
            'value'=>$get->get('value'),
            'material'=>$get->get('material'),
            'models'=>$get->get('design'),
            'object'=>$get->get('object'),
            ])
            ->joinWith('cate')
            ->asArray();

        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(),'pageSize'=>15]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        //var_dump($model);die();
        return $this->render('cake',['model'=>$model,'pages'=>$pages]);
    }

    public function actionFlower(){
        $get = \Yii::$app->request;
        $query = Goods::find()->filterWhere([
            'name'=>'鲜花',
            'color'=>$get->get('color'),
            'holiday'=>$get->get('holiday'),
            'material'=>$get->get('material'),
        ])
            ->joinWith('cate')
            ->asArray();

        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(),'pageSize'=>15]);
        $model = $query->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        //var_dump($model);die();
        return $this->render('flower',['model'=>$model,'pages'=>$pages]);
    }

}