<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;


use backend\models\UploadForm;
use backend\models\UpmoreForm;
use yii\web\UploadedFile;

class UploadController extends BaseController
{
    public function actionLoadsingle(){

        $model = new UploadForm();

        if(\Yii::$app->request->isPost){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->validate()){
                $date = date('Ymd');
                $path = \Yii::getAlias('@frontend').'/web/uploads/'.$date.'/';
                if(!file_exists($path)){
                    mkdir($path,077,true);
                }
                $extension = $model->imageFile->getExtension();
                $name = date('YmdHis').rand(1000,9999);
                $savePath = 'uploads/'.$date.'/';
                $model->imageFile->saveAs($path.$name.'.'.$extension);
                $success = [
                    'status'=>'success',
                    'msg'   =>'上传成功',
                    'filePath'=>$savePath,
                    'fileName'=>$name.'.'.$extension,
                ];
                echo json_encode($success);
            }else{
                echo $model->imageFile;
                print_r($_FILES);
                die();
            }
        }

    }

    public function actionLoadsmore(){
        $model = new UpmoreForm();

        if(\Yii::$app->request->isPost){
            $model->images = UploadedFile::getInstance($model, 'images');

            if($model->validate()){
                $date = date('Ymd');
                $path = \Yii::getAlias('@frontend').'/web/uploads/'.$date.'/';
                if(!file_exists($path)){
                    mkdir($path,077,true);
                }
                $extension = $model->images->getExtension();
                $name = date('YmdHis').rand(1000,9999);
                $savePath = 'uploads/'.$date.'/';
                $model->images->saveAs($path.$name.'.'.$extension);
                $success = [
                    'status'=>'success',
                    'msg'   =>'上传成功',
                    'filePath'=>$savePath.$name.'.'.$extension,
                ];
                echo json_encode($success);
            }else{
                echo $model->images;
                print_r($model->errors);
                die();
            }
        }
    }

}