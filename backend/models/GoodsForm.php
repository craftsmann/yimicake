<?php

namespace backend\models;

use common\models\Detail;
use common\models\Goods;
use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "ym_goods".
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
 * @property integer $isrecommend
 * @property string $midimg
 * @property string $smimg1
 * @property string $smimg2
 * @property string $created_at
 * @property string $updated_at
 */
class GoodsForm extends BaseModel
{
    const EVENT_ADD_GOODS='addGoods';
    public $title;
    public $cateid;
    public $num;
    public $shopprice;
    public $marketprice;
    public $trueprice;
    public $package;
    public $material;
    public $words;
    public $value;
    public $object;
    public $models;
    public $color;
    public $holiday;
    public $isshow;
    public $istime;
    public $isrecommend;
    public $isbanner;
    public $content;
    public $images;
    public $detail;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'cateid', 'num','content','detail','shopprice', 'marketprice','package', 'trueprice', 'words'], 'required'],
            [['cateid', 'num','value', 'object', 'models', 'color', 'holiday', 'isshow', 'istime','isbanner','isrecommend'], 'integer'],
            [['shopprice', 'marketprice', 'trueprice',],'double'],
            [['title', 'words', 'material', 'package'], 'string', 'max' => 255],
            ['images','string'],
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

    /**
     * 处理添加事件
     * @return bool
     */
    public function addHandle(){


        $shop = new Goods();
        //开启事务
        //echo '<pre>';print_r($goods->description);echo '</pre>';die();
        $trans = Yii::$app->db->beginTransaction();
        try{
            $shop->title = $this->title;
            $shop->cateid = $this->cateid;
            $shop->num   = $this->num;
            $shop->shopprice = $this->shopprice;
            $shop->marketprice=$this->marketprice;
            $shop->trueprice = $this->trueprice;
            $shop->words  = $this->words;
            $shop->detail = $this->detail;
            $shop->package = $this->package?:'';
            $shop->material= $this->material?:'';
            $shop->value  = $this->value?:'';
            $shop->object = $this->object?:'';
            $shop->models = $this->models?:'';
            $shop->color  = $this->color?:'';
            $shop->holiday= $this->holiday?:'';
            $shop->isshow = $this->isshow?:10;
            $shop->isrecommend = $this->isrecommend?:1;
            $shop->istime = $this->istime?:1;
            $shop->isbanner = $this->isbanner?:1;

            $im = array_values(array_unique(explode('|',$this->images)));
            $shop->midimg = $im[0];
            $shop->smimg1 = $im[1];
            $shop->smimg2 = isset($im[2])?$im[2]:'';

           // echo '<pre>';print_r($shop->getValidators());echo '</pre>';die();
            if(!$shop->save()){
                var_dump($shop->getErrors());die();
            }
            $event = array_merge(['content'=>$this->content],$shop->getAttributes());
            $this->addEvent($event);
            $trans->commit();
            return true;
        } catch (Exception $e){
            $trans->rollBack();
            return false;
        }

    }
    //添加监察的事件
    private function addEvent($event){

        $this->on(self::EVENT_ADD_GOODS,[$this,'addContent'],$event);
        $this->trigger(self::EVENT_ADD_GOODS);
    }

    protected function addContent($event){

        $id = $event->data['id'];
        $con = new Detail();
        $con->goods_id = $id;
        $con->content = $this->content;
        if(!$con->save()){
            throw new Exception('保存出错，请重新尝试');
        }
    }
}


