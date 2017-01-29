<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%model}}".
 *
 * @property string $id
 * @property string $moname
 * @property integer $created_at
 * @property integer $updated_at
 */
class Design extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%model}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['moname'], 'required'],
            [['moname'], 'string', 'max' => 255],
            [['cate_id', 'updated_at', 'created_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'moname' => '造型名称',
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
