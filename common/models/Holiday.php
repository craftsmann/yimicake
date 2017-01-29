<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%holiday}}".
 *
 * @property string $id
 * @property string $hname
 * @property integer $created_at
 * @property integer $updated_at
 */
class Holiday extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%holiday}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hname'], 'required'],
            [['cate_id', 'updated_at', 'created_at'], 'integer'],
            [['hname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hname' => '节日名称',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getCatename(){

        return $this->hasOne(Category::className(),['id'=>'cate_id']);
    }
}
