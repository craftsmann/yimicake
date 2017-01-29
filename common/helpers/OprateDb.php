<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace common\helpers;
use Yii;
use yii\db\Query;

class OprateDb{
    //错误
    public $errors;
    //数据库
    protected $db;
    //table的数组
    protected $tables;
    //字符集
    protected $charset;
    //地址
    protected $addresss;
    //数据库名称
    protected $database;
    //存入的文件
    protected $name;

    /**
     * 传入构造参数
     * OprateDb constructor.
     * @param $tables
     * @param $address
     * @param $name
     * @param $charset
     */
    public function __construct($tables,$address,$name,$charset)
    {
        $this->addresss = $address;
        $this->tables   = $tables;
        $this->charset  = $charset;
        $this->name     = $name;
    }

    //设置目录权限
    protected function setDir(){
        if(!is_dir($this->addresss)){
            mkdir($this->addresss,0777,true);
        }
    }

    //过滤表
    protected function getTables(){
        //获取所有的表
        $tables = Yii::$app->db->createCommand("SHOW TABLES")     ->queryAll();
        //获取数据库名称
        $db     = Yii::$app->db->createCommand("SELECT DATABASE() AS dbname")->queryAll();
        $this->database ='';

        if(count(array_unique($db))==0){
            $this->errors .="未找到数据库";
        }else{
            $this->database = array_column($db,'dbname')[0];
        }

        $list = is_array($tables)?array_column($tables,'Tables_in_'.$this->database):'';

        foreach ($this->tables as $v){
            if(!in_array($v,$list)){
                $this->errors .="数据表不存在!";
            }
        }
        return $this->tables;
    }

    /**
     * 获取表结构
     * @param $files
     * @return mixed
     */
    protected function getColumn($files){
        $db  = Yii::$app->db->createCommand('SHOW CREATE TABLE `'.$files.'`')->queryAll();
        $res = array_column($db,'Create Table')[0];
        return $res;
    }

    /**
     * 获取表字段属性
     * @param $table
     * @return string
     */
    protected function getFields($table){

        $res = Yii::$app->db->getTableSchema($table)->columnNames;
        $str = '';
        foreach ($res as $v){
            $str .= '`'.$v.'`,';
        }
        $str = '('.substr($str,0,-1).')';
        return $str;
    }

    /**
     * 获取值
     * @param $table
     * @return string
     */
    protected function getValues($table){
        $values = (new Query())->select('*')->from($table)->all();
        $temparr= [];
        foreach ($values as $new){
            $temparr[]= '('.implode(',',$new).')';
        }
        $res = implode(",\t\n",$temparr).";\r\n";
        return $res;
    }

    /**
     * 设置头
     * @return string
     */
    protected function setTitle(){

        $str  = "-- Host: ".Yii::$app->request->getHostName()."\r\n";
        $str .= "-- Generation Time: ".date('Y-m-d H:i:s',time())."\r\n";
        $str .= "-- PHP Version: ".PHP_VERSION."\r\n";
        $str .= "-- Link ME:https://github.com/craftsmann"."\r\n";
        $str .= "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";"."\r\n";
        $str .= "SET time_zone = \"+00:00\";"."\r\n";
        $str .="--\n-- Database: `.".$this->database."`\r\n -- \n";
        $str .="-- --------------------------------------------------------\r\n";
        return $str;
    }

    /**
     * 备份
     */
    protected function back(){
        $message = $this->setTitle();
        foreach ($this->tables as $v){
            $message .='DROP TABLE IF EXISTS `'.$v.'`;';
            $message .="-- \n-- 表的结构`".$v."`\n-- \r\n";
            $message .=$this->getColumn($v);
            $message .="-- \n-- 转存表中的数据`".$v."`\r\n -- \r\n";
            $message .='INSERT INTO `'.$v.'` '.$this->getFields($v)." VALUES\n";
            $message .= $this->getValues($v);
        }
        return $message;
    }

    /**
     * 初始化
     */
    public function init(){
        header("Content-type: text/html;charset=utf-8");
        $this->setDir();
        $this->getTables();
        $msg   = $this->back();
        $files =file_put_contents($this->addresss.$this->name,$msg);
        return $files?1:0;
    }
}