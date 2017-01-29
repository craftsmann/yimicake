<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace frontend\controllers;


class ChoiceController extends BaseController
{

    public function actionList(){

        return $this->render('list');
    }

}