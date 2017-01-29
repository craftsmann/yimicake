<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%detail}}".
 *
 * @property string $id
 * @property integer $goods_id
 * @property string $content
 */
class Detail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'content'], 'required'],
            [['goods_id'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_id' => 'Goods ID',
            'content' => 'Content',
        ];
    }
}
