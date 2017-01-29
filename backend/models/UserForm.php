<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;
use common\models\AdminUser;
use Yii;

class UserForm extends BaseModel{

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
     * 自定义验证排除本身
     * @param $attr
     */
    public function verifyUser($attr){
        if(Yii::$app->user->identity->username !== $this->username){
            $data = AdminUser::findOne(['username'=>$this->username]);
            if($data){
                $this->addError($attr,'用户名已经被占用。');
            }
        }
    }

    /**
     * 处理用户数据修改
     * @return bool
     */
    public  function dataHandle(){

        if (!$this->validate()) {
            return null;
        }
        $user = AdminUser::find()->where(['id'=>Yii::$app->user->identity->id])->one();
        //如果用户名已经存在除过其本身
        if(Yii::$app->user->identity->username !== $this->username){
            $email = AdminUser::findOne(['username'=>$this->email]);
            $data = AdminUser::findOne(['username'=>$this->username]);
            if($data || $email){return false;}
        }
        $user->username = $this->username;
        $user->email    = $this->email;
        $user->phone    = $this->phone;
        $user->qq       = (int)$this->qq;
        $user->login_ip       = Yii::$app->request->userIP;
        $user->sex      = $this->sex;
        $user->photo    = (string)$this->photo;
        return $user->save()?true:false;
    }

    /**
     * 添加后台用户
     * @return bool|null
     */
    public function addHandle(){
        if (!$this->validate()) {
            return null;
        }
        //判断添加用户名
        $user =new AdminUser();
        $email = AdminUser::findOne(['email'=>$this->email]);
        $data = AdminUser::findOne(['username'=>$this->username]);
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
        $user =AdminUser::findOne(['id'=>$this->id]);
        $username = $user->username;
        //判断当前用户和更新用户名
        if($username != $this->username){
            $email = AdminUser::findOne(['email'=>$this->email]);
            $data = AdminUser::findOne(['username'=>$this->username]);
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