<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


use yii\web\Controller;
use Yii;

class SiteController extends Controller
{
    //登录
    public function actionLogin(){

        return $this->render('login');
    }

    //注册
    public function actionSignup(){

        return $this->render('signup');
    }
}
