<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


class PersonalController extends BaseController
{
    public function actionIndex(){
        return $this->render('index');
    }

}