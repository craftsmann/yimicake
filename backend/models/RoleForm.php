<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;

use yii\db\ActiveRecord;
use yii\helpers\Html;
use Yii;

class RoleForm extends ActiveRecord{

    //定义场景
    const SCENARIO_ROLE_ADD  = 'add';
    const SCENARIO_ROLE_UPDATE = 'update';
    public $name;
    public $description;

    public function rules()
    {
        return [
            [['name','description'],'required'],
            ['name','string'],
            ['description','filter','filter'=>function($val){return Html::encode($val);}]
        ];
    }

    /**
     * 设置场景
     * @return array
     */
    public function scenarios()
    {
        return [
            self::SCENARIO_ROLE_ADD => ['name','description'],
            self::SCENARIO_ROLE_UPDATE=>['name','description']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name'=>'角色',
            'description'=>'描述',
        ];
    }

    /**
     * 添加角色处理
     * @return bool
     */
    public function addHandle(){
        if(!$this->validate()){return false;}
        $auth = Yii::$app->authManager;
        //获取角色,存在则创建失败
        $data = $auth->getRole($this->name);
        if($data){
            return false;
        }
        //创建角色
        $new = $auth->createRole($this->name);
        $new->description = $this->description;
        if($auth->add($new)){
            return true;
        }
        return false;
    }

    public function updateHandle($name){

        if(!$this->validate()){return false;}
        //移除旧角色
        $auth = Yii::$app->authManager;
        if(!$name) return false;
        $auth->remove($name);

        //迎来新角色
        $new = $auth->createRole($this->name);
        $new->description = $this->description;
        if($auth->add($new)){return true;}
        return false;
    }
}