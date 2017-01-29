<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%value}}".
 *
 * @property string $id
 * @property string $vname
 * @property integer $created_at
 * @property integer $updated_at
 */
class Value extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%value}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vname'], 'required'],
            [['cate_id'], 'required'],
            [['cate_id', 'created_at', 'updated_at'], 'integer'],
            [['vname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vname' => '用途名称',
            'cate_id' => '分类名称',
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
