<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%comments}}".
 *
 * @property string $id
 * @property integer $goods_id
 * @property integer $user_id
 * @property integer $type
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'user_id', 'type', 'comment'], 'required'],
            [['goods_id', 'user_id', 'type', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => 'Goods ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public function getGoods(){

        return $this->hasOne(Goods::className(),['id'=>'goods_id']);
    }

    public function getUsers(){

        return $this->hasOne(User::className(),['id'=>'user_id']);
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
