<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;
use Codeception\Command\Shared\Config;
use common\models\Category;
use common\models\Conf;
use Yii;


use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class BaseController extends Controller
{

    /**
     * 进行访客和权限的判断;
     * @param \yii\base\Action $action
     * @return bool|\yii\web\Response
     * @throws ForbiddenHttpException
     */
    public function beforeAction($action)
    {
        $controller = $action->controller->id;
        $action     = $action-> id;
        $access     = $controller.'/'.$action;
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/login']);
        }
        if(Yii::$app->user->id==Yii::$app->params['SuperId']){
            return true;
        }
        if(!Yii::$app->user->can($access)){
            throw new ForbiddenHttpException('您没有权限访问');
        }

        return true;
    }

    //初始化
    public function init()
    {
        $conf   = Conf::find()->asArray()->all();
        $params = Category::find()->asArray()->all();
        Yii::$app->params['CATE']=ArrayHelper::map($params,'id','name');
        Yii::$app->params['CONFIG']=ArrayHelper::map($conf,'name','value');
    }

}