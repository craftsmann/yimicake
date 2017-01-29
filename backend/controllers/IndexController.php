<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;
use backend\models\UploadForm;
use yii\web\UploadedFile;

class IndexController extends BaseController
{
    /**
     * 首页
     * @return string
     */
    public function actionIndex(){

        return $this->render('index');

    }

}