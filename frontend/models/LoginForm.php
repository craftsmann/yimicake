<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */

namespace frontend\models;


use common\models\User;

class LoginForm extends BaseModel
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 3, 'max' => 10],

            ['password', 'required'],
            ['password', 'string', 'min' => 4,'max'=>20],
            ['password','verifyPass']
        ];
    }

    public function verifyPass($attr){
        if(!$this->hasErrors()){
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password)){
                $this->addError($attr,'用户名或者密码错误');
            }
        }
    }
    //获取用户
    public function getUser(){
        return User::findByUsername($this->username);
    }

    //登录
    public function realLogin(){
        return !$this->validate()?false:\Yii::$app->user->login($this->getUser());
    }

    public function attributeLabels()
    {
        return [
            'username'=>'用户名',
            'password'=>'密码',
        ];
    }

}