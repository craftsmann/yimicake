<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */

namespace frontend\models;


use common\models\User;

class UserForm extends BaseModel
{
    public $email;
    public $sex;
    public $qq;
    public $site;
    public $phone;
    public $truename;

    public function rules()
    {
        return [
            ['truename','string','max'=>6],
            ['sex','default','value'=>'男'],
            ['site','string'],

            [['qq','phone'],'number'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'truename'=>'姓名',
            'sex'=>'性别',
            'qq' =>'QQ',
            'phone'=>'手机',
            'site' =>'地址',
        ];
    }

    public function updateHandle(){

        if(!$this->validate()){return null;}

        $res = \Yii::$app->db->createCommand()->update(User::tableName(),[
            'truename'=>$this->truename,
            'sex'     =>$this->sex,
            'qq'      =>$this->qq,
            'phone'   =>$this->phone,
            'site'    =>$this->site,
        ],"id='".\Yii::$app->user->identity->id."'")->execute();
        return !$res?false:true;
    }

}