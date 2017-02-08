<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%object}}".
 *
 * @property string $id
 * @property string $oname
 * @property integer $created_at
 * @property integer $updated_at
 */
class Object extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%object}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['oname'], 'required'],
            [['oname'], 'string', 'max' => 255],
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
            'oname' => '对象名称',
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
