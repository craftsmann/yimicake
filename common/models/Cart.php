<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property integer $num
 * @property integer $price
 * @property integer $created_at
 * @property integer $updated_at
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'goods_id', 'num'], 'required'],
            [['uid', 'goods_id', 'num','created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'goods_id' => 'Goods ID',
            'num' => 'Num',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getGoods(){
        return $this->hasOne(Goods::className(),['id'=>'goods_id']);
    }
}
