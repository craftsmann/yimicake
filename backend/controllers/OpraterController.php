<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;

use common\models\Log;
use yii\data\Pagination;
use yii\web\Response;

class OpraterController extends BaseController{
    /**
     * 操作记录展示
     * @return string
     */
    public function actionList(){
        $query = Log::find()
                ->filterWhere([
                    'oprater'=>\Yii::$app->request->post('oprater'),
                    'tablename'=>\Yii::$app->request->post('tablename'),
                    'methods'=>\Yii::$app->request->post('methods'),
                    'ip'=>\Yii::$app->request->post('ip'),
                    'url'=>\Yii::$app->request->post('url'),
                ])
                ->orderBy(['created_at'=>SORT_DESC])
                ->asArray();

        $count = clone $query;

        $pages = new Pagination(['totalCount'=>$count->count(),'pageSize'=>\Yii::$app->params['PageSize']]);

        $models = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('list',['pages'=>$pages,'models'=>$models]);
    }

    /**
     * 清除日志
     * @return array
     */
    public function actionClear(){
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $methods = \Yii::$app->request->get('methods');
        $success = ['status'=>'1','msg'=>'清空日志成功'];
        $error = ['status'=>'2','msg'=>'清空日志失败'];
        if($methods == 'clearall'){
           \Yii::$app->db->createCommand("TRUNCATE TABLE `ym_log`")->execute();
           return $success;
        }
        return $error;
    }

    /**
     * 查看详情
     * @return string
     */
    public function actionSee(){
        $this->layout= false;
        $id = \Yii::$app->request->get('id');
        $models = Log::find()->where(['id'=>(int)$id])->asArray()->one();
        return $this->render('see',['models'=>$models]);
    }
}