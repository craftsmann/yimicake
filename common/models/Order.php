<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property integer $orders_id
 * @property integer $sum
 * @property integer $uid
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $recive_user
 * @property integer $recive_phone
 * @property string $recive_site
 * @property string $recive_require
 * @property integer $recive_time
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['orders_id', 'sum', 'uid', 'recive_user', 'recive_phone', 'recive_site', 'recive_time'], 'required'],
            [['orders_id', 'sum', 'uid', 'created_at', 'updated_at', 'recive_phone', 'recive_time'], 'integer'],
            [['recive_user'], 'string', 'max' => 45],
            [['recive_site', 'recive_require'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orders_id' => 'Orders ID',
            'sum' => 'Sum',
            'uid' => 'Uid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'recive_user' => 'Recive User',
            'recive_phone' => 'Recive Phone',
            'recive_site' => 'Recive Site',
            'recive_require' => 'Recive Require',
            'recive_time' => 'Recive Time',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
}
