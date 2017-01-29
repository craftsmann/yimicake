<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;
use Yii;
use common\models\AdminUser;


class LoginForm extends BaseModel {

    const SCENARIO_LOGIN = 'login';
    public $user;
    protected $_user;
    public $pass;
    public $verify;
    public $remember =true;

    public function rules()
    {
        return [
            [['user','pass'],'required'],
            ['user','string','length'=>[5,20]],
            ['pass','string','min'=>5],
            ['pass','verifyPass'],
            ['verify','captcha']
        ];

    }
    public function verifyPass($attr){

        if(!$this->hasErrors()){

            $person = $this->getUser();

            if(!$person || !$person->validatePassword($this->pass)){

                $this->addError($attr,'用户或密码错误');

            }
        }
    }
    protected function getUser(){

        if($this->_user == null){
            if(preg_match('/^[a-zA-Z0-9-_]+(\.\w+)*@[a-zA-Z0-9-_]+\.(\w+)$/',$this->user)){
                return AdminUser::findByEmail($this->user);
            }else if(preg_match('/^\w+$/',$this->user)){
                return AdminUser::findByUsername($this->user);
            }
        }else{
            return $this->_user;
        }
    }

    public function login(){

        return !$this->validate()?false:Yii::$app->user->login($this->getUser(),$this->remember?60*60*1:0);
    }

    public function attributeLabels()
    {
        return [
            'user'=>'用户名/邮箱',
            'pass'=>'密码',
            'verify'=>'验证码'
        ];
    }

}