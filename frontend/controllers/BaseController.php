<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


use yii\web\Controller;
use Yii;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        return true;
    }
}