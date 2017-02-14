<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


use common\models\Conf;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        return true;
    }

    //初始化
    public function init()
    {
        $conf   = Conf::find()->asArray()->all();
        Yii::$app->params['CONFIG']=ArrayHelper::map($conf,'name','value');
    }
}