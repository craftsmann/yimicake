<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace common\helpers;


use common\models\Log;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use Yii;

class OprateLog
{
    static public function record($event){
        if($event->sender instanceof Log || !$event->sender->primaryKey()){return;}

        if($event->name==ActiveRecord::EVENT_AFTER_UPDATE){
            $methods = 'UPDATE';
            $description = "%s操作表%s,方法展示:UPDATE,字段展示:%s,路由:%s";
        }elseif ($event->name==ActiveRecord::EVENT_AFTER_INSERT){
            $methods = 'INSERT';
            $description = "%s操作表%s,方法展示:INSERT,字段展示:%s,路由:%s";
        }elseif($event->name==ActiveRecord::EVENT_AFTER_DELETE){
            $methods = 'DELETE';
            $description = "%s操作表%s,方法展示:DELETE,字段展示:%s,路由:%s";
        }else{
            return;
        }

        $fields = '';
        if(!empty($event->changedAttributes)){
            foreach ($event->changedAttributes as $k=>$v){
                $fields .=$k.':'.$v.',';
            }
            $fields = substr($fields,0,-1);
        }else{
            $fields = '';
        }
        $tableName = $event->sender->tableSchema->name;
        $uid       = Yii::$app->user->identity->id;
        $username  = Yii::$app->user->identity->username;
        $url       = Yii::$app->request->url;
        $ip        = Yii::$app->request->userIP;
        $content   = sprintf($description,$username,$tableName,$fields,$url);

        $models = new Log();
        $models->uid = $uid;
        $models->ip  = $ip;
        $models->url = $url?$url:'';
        $models->tablename = $tableName?$tableName:'';
        $models->methods = $methods?$methods:'';
        $models->oprater = $username;
        $models->description = $content;
        if(!$models->save()){var_dump($models->errors);};
    }

}