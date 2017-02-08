<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property string $id
 * @property string $uid
 * @property string $url
 * @property string $ip
 * @property string $tablename
 * @property string $methods
 * @property string $oprater
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'url', 'ip', 'tablename', 'methods', 'oprater', 'description'], 'required'],
            ['uid', 'integer'],
            [['url', 'ip', 'tablename', 'methods', 'oprater'], 'string', 'max' => 255],
            [['description'], 'string'],
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
            'url' => 'Url',
            'ip' => 'Ip',
            'tablename' => 'Tablename',
            'methods' => 'Methods',
            'oprater' => 'Oprater',
            'description' => 'Description',
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
}
