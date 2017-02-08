<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace common\models;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;


class AdminUser extends ActiveRecord implements IdentityInterface{

    //定义用户登陆状态
    const USER_ACTIVE   = 10;
    const USER_DISABLED =  0;

    //返回adminuser表
    public static function tableName()
    {
        return '{{%adminuser}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::USER_ACTIVE],
            ['status', 'in', 'range' => [self::USER_DISABLED, self::USER_ACTIVE]],
        ];
    }


    //时间自动更新
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    /**
     * 通过用户名登录
     * @param $user
     * @return static
     */
    public static function findByUsername($user){

        return static::findOne(['username'=>$user,'status'=>self::USER_ACTIVE]);

    }

    /**
     * 通过email登录
     * @param $user
     * @return static
     */
    public static function findByEmail($user){
        return static::findOne(['email'=>$user,'status'=>self::USER_ACTIVE]);
    }

    /**
     * 检验密码
     * @param $pass
     * @return bool
     */
    public function validatePassword($pass){

        return Yii::$app->security->validatePassword($pass,$this->password_hash);
    }

    /**
     * 设置密码
     * @param $pass
     * @return string
     */
    public function setPassword($pass){
        $this->password_hash = Yii::$app->security->generatePasswordHash($pass);
    }

    /**
     * 创建登录auth
     * @return string
     */
    public function generateAuthKey(){
        return $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public static function findIdentity($id)
      {
         return static::findOne(['id'=>$id, 'status' => self::USER_ACTIVE]);
     }

     public static function findIdentityByAccessToken($token, $type = null)
      {
            return static::findOne(['access_token' => $token]);
         }

     public function getId()
     {
           return $this->id;
         }

     public function getAuthKey()
     {
            return $this->auth_key;
     }

     public function validateAuthKey($authKey)
     {
         return $this->auth_key === $authKey;
     }
}