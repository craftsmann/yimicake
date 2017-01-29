<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;

use Yii;

class IndexController extends BaseController
{

    public function actionIndex(){

        $this->layout = 'other';
        return $this->render('index');
    }

}