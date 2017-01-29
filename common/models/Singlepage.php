<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%singlepage}}".
 *
 * @property string $id
 * @property string $name
 * @property string $view
 * @property string $description
 * @property string $content
 * @property string $created_at
 * @property string $updated_at
 */
class Singlepage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%singlepage}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'view', 'content','description',], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'view','description', ], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'view' => '模板',
            'description'=>'描述',
            'content' => '单页内容',
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
