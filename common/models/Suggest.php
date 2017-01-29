<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%suggest}}".
 *
 * @property string $id
 * @property string $type
 * @property string $nickname
 * @property string $ip
 * @property string $oprater
 * @property string $email
 * @property string $title
 * @property string $content
 * @property integer $created_at
 * @property integer $updated_at
 */
class Suggest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%suggest}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['nickname', 'ip', 'oprater', 'email', 'content', 'created_at', 'updated_at'], 'required'],
            [['nickname'], 'string', 'max' => 20],
            [['ip', 'oprater', 'email', 'title'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'nickname' => 'Nickname',
            'ip' => 'Ip',
            'oprater' => 'Oprater',
            'email' => 'Email',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
