<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $cateid
 * @property integer $num
 * @property integer $salesnum
 * @property integer $shopprice
 * @property integer $marketprice
 * @property integer $trueprice
 * @property string $words
 * @property string $detail
 * @property string $material
 * @property string $package
 * @property integer $value
 * @property integer $object
 * @property integer $models
 * @property integer $color
 * @property integer $holiday
 * @property integer $isshow
 * @property integer $istime
 * @property integer $isbanner
 * @property string $midimg
 * @property string $smimg1
 * @property string $smimg2
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $isrecommend
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'cateid', 'num', 'shopprice', 'marketprice', 'trueprice', 'words', 'detail', 'midimg'], 'required'],
            [['cateid', 'num', 'salesnum', 'shopprice', 'marketprice', 'trueprice', 'value', 'object', 'models', 'color', 'holiday', 'isshow', 'istime', 'isbanner', 'created_at', 'updated_at', 'isrecommend'], 'integer'],
            [['title', 'words', 'detail', 'material', 'package', 'midimg', 'smimg1', 'smimg2'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'cateid' => 'Cateid',
            'num' => 'Num',
            'salesnum' => 'Salesnum',
            'shopprice' => 'Shopprice',
            'marketprice' => 'Marketprice',
            'trueprice' => 'Trueprice',
            'words' => 'Words',
            'detail' => 'Detail',
            'material' => 'Material',
            'package' => 'Package',
            'value' => 'Value',
            'object' => 'Object',
            'models' => 'Models',
            'color' => 'Color',
            'holiday' => 'Holiday',
            'isshow' => 'Isshow',
            'istime' => 'Istime',
            'isbanner' => 'Isbanner',
            'midimg' => 'Midimg',
            'smimg1' => 'Smimg1',
            'smimg2' => 'Smimg2',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isrecommend' => 'Isrecommend',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    public function getCate(){

        return $this->hasOne(Category::className(),['id'=>'cateid']);

    }

    public function getValue(){

        return $this->hasOne(Value::className(),['id'=>'value']);
    }



}
