<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id
 * @property string $name
 * @property string $pid
 * @property string $order
 * @property string $data
 * @property string $route
 * @property string $created_at
 * @property string $updated_at
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'order','type'], 'required'],
            [['pid', 'order', 'created_at', 'updated_at'], 'integer'],
            [['name', 'data', 'route'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function getSubMenu(){
        return $this->hasMany(Menu::className(),['id'=>'pid'])->from(Menu::tableName().' list');
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'pid' => 'Pid',
            'order' => 'Order',
            'data' => 'Data',
            'route' => 'Route',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
