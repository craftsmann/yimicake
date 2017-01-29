<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;
use common\helpers\OprateDb;
use yii\base\Exception;
use yii\web\Controller;
use Yii;
use yii\web\Response;

/**
 * 数据库操作类
 * Class DataController
 * @package backend\controllers
 */
class DataController extends Controller{

    /**
     * 取得数据库信息
     * @return string
     */
    public function actionBackup(){

      $tables = Yii::$app->db->createCommand("SHOW TABLES")->queryAll();
      $res = [];

      foreach (array_column($tables,'Tables_in_yimi') as $v){
          $db  =Yii::$app->db->createCommand("SHOW TABLE STATUS FROM `yimi` LIKE '$v'")->queryAll();
          $res[]= $db[0];
      }
      return $this->render('backup',['db'=>$res]);
    }

    /**
     * 备份全部表
     * @return array
     */
   public function actionBackupall(){
       Yii::$app->response->format = Response::FORMAT_JSON;
       $name = Yii::$app->request->get('data');
       $success = ['status'=>'1','msg'=>'备份数据表'.$name.'成功'];
       $error = ['status'=>'2','msg'=>'备份数据表'.$name.'失败'];
       $names = explode(',',$name);
       $tables  = new OprateDb($names,Yii::$app->params['Address'],'/my.sql','utf-8');
       return !$tables->init()?$error:$success;
   }

    /**
     * 备份单个表
     * @return array
     */
   public function actionBackupone(){
       Yii::$app->response->format = Response::FORMAT_JSON;
       $name = Yii::$app->request->get('name');
       $success = ['status'=>'1','msg'=>'备份数据表'.$name.'成功'];
       $error = ['status'=>'2','msg'=>'备份数据表'.$name.'失败'];
       $names[] =$name;
       $tables  = new OprateDb($names,Yii::$app->params['Address'],'/my.sql','utf-8');
       return !$tables->init()?$error:$success;
   }

    //优化单个表
    public function actionOptimize(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $name = Yii::$app->request->get('name');
        $success = ['status'=>'1','msg'=>'优化数据表'.$name.'成功'];
        $error = ['status'=>'2','msg'=>'优化数据表'.$name.'失败'];
        $res  = Yii::$app->db->createCommand("OPTIMIZE TABLE".'`'.(string)$name.'`')->execute();
        return !$res?$error:$success;
    }

    //优化全部表
    public function actionOptimizeall(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $names = Yii::$app->request->get('data');
        $success = ['status'=>'1','msg'=>'优化全部数据表成功'];
        $error = ['status'=>'2','msg'=>'优化数据表失败'];
        $res = explode(',',$names);
        $trans = Yii::$app->db->beginTransaction();
        try{
            foreach ($res as $v){
                Yii::$app->db->createCommand("OPTIMIZE TABLE".'`'.(string)$v.'`')->execute();
            }
            $trans->commit();
            return $success;
        }catch (Exception $e){
            $trans->rollBack();
            return $error;
        }
    }
}