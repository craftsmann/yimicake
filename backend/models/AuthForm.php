<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

class AuthForm extends BaseModel{

    const SCENARIO_AUTH_ADD = 'add';
    public $name;
    public $description;
    public $pid;

    public function rules()
    {
        return [
            [['name','description'],'required'],
            ['name','string'],
            ['pid','default','value'=>0]
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_AUTH_ADD=>['name','description','pid']
        ];
    }

    public function handleRouteAdd(){
        $auth = Yii::$app->authManager;
        if(!$this->validate()){
            return false;
        }
        //权限不存在时候允许添加
        if($auth->getPermission($this->name)){
            return false;
        }
        //创建权限
        $record = $auth->createPermission($this->name);
        $record->description = $this->description;
        $record->data         = $this->pid;

        return $auth->add($record)?1:0;
    }

    /**
     * 时间添加行为
     * @return array
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function attributeLabels()
    {
        return [
            'name'=>'路由',
            'description'=>'名称',
            'pid'   =>'父级'
        ];
    }

}