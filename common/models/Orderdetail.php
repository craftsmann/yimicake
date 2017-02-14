<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%orderdetail}}".
 *
 * @property integer $id
 * @property integer $oid
 * @property integer $num
 * @property integer $gid
 * @property integer $uid
 */
class Orderdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orderdetail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['oid', 'num', 'gid', 'uid'], 'required'],
            [['oid', 'num', 'gid', 'uid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'oid' => 'Oid',
            'num' => 'Num',
            'gid' => 'Gid',
            'uid' => 'Uid',
        ];
    }
}
