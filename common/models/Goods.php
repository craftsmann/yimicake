<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property string $id
 * @property string $title
 * @property integer $cateid
 * @property integer $num
 * @property integer $salesnum
 * @property integer $shopprice
 * @property integer $marketprice
 * @property integer $trueprice
 * @property string $words
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
 * @property string $created_at
 * @property string $updated_at
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
            [['title', 'cateid', 'detail','num','shopprice', 'marketprice', 'trueprice', 'words', 'midimg'], 'required'],
            [['cateid', 'num', 'salesnum', 'value', 'object', 'models', 'color', 'holiday', 'isshow','isbanner', 'istime', 'created_at', 'updated_at'], 'integer'],
            [[ 'shopprice', 'marketprice', 'trueprice'],'double'],
            [['title', 'words', 'material', 'package', 'midimg', 'smimg1', 'smimg2'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'title' => '商品名称',
        'cateid' => '商品分类',
        'num' => '商品库存',
        'salesnum' => '产品销量',
        'shopprice' => '销售价格',
        'marketprice' => '市场价格',
        'trueprice' => '商品进价',
        'words' => '商品寄语',
        'detail'=>'商品详细',
        'material' => '材料',
        'package' => '商品包装',
        'value' => '用途',
        'object' => '对象',
        'models' => '造型',
        'color' => '颜色',
        'holiday' => '节日',
        'isshow' => '上架',
        'istime' => '促销',
        'isbanner'=>'轮播',
        'images' =>'展示图',
        'content'=>'商品详情',
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

    public function getCate(){

        return $this->hasOne(Category::className(),['id'=>'cateid']);

    }
}
