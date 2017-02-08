<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;
use common\models\User;
use Yii;

class FuserForm extends BaseModel{

    const SCENARIO_LOGIN_USER  = 'set';
    const SCENARIO_ADD_USER    = 'add';
    const SCENARIO_UPDATE_USER = 'update';

    public $username;
    public $password;
    public $email;
    public $status;
    public $photo;
    public $phone;
    public $qq;
    public $sex;
    public $id;

    public function rules()
    {
        return [
            [['username','email','status','sex','password'],'required'],
            ['username','string','length'=>[5,20]],
            ['username','trim'],
            ['password','string','length'=>[5,32]],
            [['photo'],'safe'],
            [['status','id'],'integer'],
            [['qq','phone'], 'filter','filter' => 'intval', 'skipOnArray' => true],
        ];

    }

    /**
     * 添加前台用户
     * @return bool|null
     */
    public function addHandle(){

        if (!$this->validate()) {
            return null;
        }
        //判断添加用户名
        $user =new User();
        $email = User::findOne(['email'=>$this->email]);
        $data = User::findOne(['username'=>$this->username]);
        if($data || $email){return false;}
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->login_ip = Yii::$app->request->userIP;
        $user->email    = $this->email;
        $user->phone    = $this->phone;
        $user->qq       = (int)$this->qq;
        $user->sex      = $this->sex;
        $user->photo    = (string)$this->photo;
        $user->status   = $this->status;

        return $user->save()?true:false;
    }

    /**
     * 更新用户处理
     * @return bool|null
     */
    public function updateHandle(){

        if (!$this->validate()) {
            return null;
        }
        $user =User::findOne(['id'=>$this->id]);
        $username = $user->username;
        //判断当前用户和更新用户名
        if($username != $this->username){
            $email = User::findOne(['email'=>$this->email]);
            $data = User::findOne(['username'=>$this->username]);
            if($data || $email){return false;}
        }
        $user->username = $this->username;
        $user->email    = $this->email;
        $user->phone    = $this->phone;
        $user->qq       = (int)$this->qq;
        $user->sex      = $this->sex;
        $user->photo    = (string)$this->photo;
        $user->status   = $this->status;
        return $user->save()?true:false;
    }

    //定义场景
    public function scenarios()
    {
        return [
            self::SCENARIO_ADD_USER =>['username','password','status','email','photo','sex','qq','phone'],
            self::SCENARIO_LOGIN_USER=>['username','email','photo','sex','qq','phone',],
            self::SCENARIO_UPDATE_USER=>['id','username','status','email','photo','sex','qq','phone'],
        ];
    }

}