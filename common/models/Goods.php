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
            'isrecommend'=>'推荐',
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

    public function getValue(){

        return $this->hasOne(Value::className(),['id'=>'value']);
    }

    public function getCon(){
        return $this->hasOne(Detail::className(),['goods_id'=>'id']);
    }



}
