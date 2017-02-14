<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


use common\models\Singlepage;
use frontend\models\LoginForm;
use frontend\models\SignupForm;
use yii\captcha\Captcha;
use yii\web\Controller;
use Yii;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'maxLength' => 3, //最大显示个数
                'minLength' => 3,//最少显示个数
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    //退出登录
    public function actionLogout(){
        if(Yii::$app->user->logout()){
          return $this->redirect(['index/index']);
        }
    }

    //登录
    public function actionLogin(){
        $model = new LoginForm();

        if(Yii::$app->request->isPost){
           if($model->load(Yii::$app->request->post()) && $model->realLogin()){
               if(Yii::$app->request->cookies->has('YIMICAKE')){
                  Yii::$app->response->cookies->remove('YIMICAKE');
               }
               return $this->redirect(['index/index']);
           }
        }
        return $this->render('login',['model'=>$model]);
    }

    //注册
    public function actionSignup(){
        $model = new SignupForm();
        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post())&& $model->signup()){
                return $this->redirect(['login']);
            }
        }
        return $this->render('signup',['model'=>$model]);
    }

    //站点帮助
    public function actionHelp(){

        $request = Yii::$app->request;
        $item = $request->get('item')?$request->get('item'):'logistics';
        $data = Singlepage::find()->where('view=:view',[':view'=>(string)$item])->one();

        return $this->render('help',['model'=>$data]);
    }
}
