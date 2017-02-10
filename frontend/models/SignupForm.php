<?php
namespace frontend\models;

use common\models\Credit;
use yii\base\Exception;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    const EVENT_CREDIT_ADD = 'addcredit';
    public $username;
    public $email;
    public $password;
    public $repass;
    public $verify;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '该用户名已经被注册了.'],
            ['username', 'string', 'min' => 3, 'max' => 10],


            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 30],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '该邮箱已经被占用了.'],

            ['repass', 'required'],
            ['repass', 'compare','compareAttribute'=>'password'],

            ['password', 'required'],
            ['password', 'string', 'min' => 4,'max'=>20],

            ['verify','required'],
            ['verify','captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $trans = \Yii::$app->db->beginTransaction();
        try{
            $user->username = $this->username;
            $user->email = $this->email;
            $user->sex   = '男';
            $user->login_ip = \Yii::$app->request->userIP;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if(!$user->save()){
               throw new Exception('注册出错');
            }
            $data = $user->getAttributes();
          //  echo '<pre>';print_r($data);echo '</pre>';die();
            $this->_creditEvent($data);
            $trans->commit();
            return true;
        }catch (Exception $e){
            $trans->rollBack();
            throw new Exception('注册出错！');
            return fasle;
        }
        return false;
    }

    //绑定事件
    private function _creditEvent($data){
        $this->on(self::EVENT_CREDIT_ADD,[$this,'addcredit'],$data);
        $this->trigger(self::EVENT_CREDIT_ADD);
    }

    //添加积分
    protected function addcredit($data){
        //echo '<pre>';print_r($data->data);echo '</pre>';die();
        $credit =new Credit();
        $credit->content = '初次注册所获积分';
        $credit->uid     =  $data->data['id'];
        $credit->points  =  '50';
        if(!$credit->save()){
            throw new Exception('注册用户出错');
        };
    }

    public function attributeLabels()
    {
        return [
            'username'=>'用户名',
            'password'=>'密码',
            'email'   =>'邮箱',
            'repass'  =>'重复密码',
        ];
    }
}
