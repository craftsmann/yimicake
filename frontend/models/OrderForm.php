<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */

namespace frontend\models;


use common\models\Cart;
use common\models\Order;
use common\models\Orderdetail;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;

class OrderForm extends BaseModel
{
    const ADD_EVENT_DATIL='adddetail';
    public $sum;
    public $recive_user;
    public $recive_phone;
    public $recive_site;
    public $recive_require;
    public $orders_time;
    public function rules()
    {
        return [
            [['sum', 'recive_user','orders_time', 'recive_phone', 'recive_site'], 'required'],
            [['sum', 'recive_phone'], 'integer'],
            [['recive_user'], 'string', 'max' => 45],
            [['recive_site', 'recive_require'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sum'=>'订单总金额',
            'recive_user'=>'收货人',
            'recive_phone'=>'收货电话',
            'recive_site'=>'收货地址',
            'recive_require'=>'收货要求',
            'orders_time'=>'收货时间',
        ];
    }

    public function addData(){

        if(!$this->validate()){return false;}
        $oid = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $trans = \Yii::$app->db->beginTransaction();
        try{
            $model = new Order();
            $model->orders_id    = $oid;
            $model->recive_user  = $this->recive_user;
            $model->recive_phone = $this->recive_phone;
            $model->recive_require = $this->recive_require;
            $model->recive_site  = $this->recive_site;
            $model->recive_time  = strtotime($this->orders_time);
            $model->sum          = $this->sum;
            $model->uid          = \Yii::$app->getUser()->id;

            if(!$model->save()){throw new Exception('下单出错');}
            $data = $model->attributes();
            echo '<pre>';print_r($model);echo '</pre>';die();
            $this->addEvent($data);
            $trans->commit();
            return true;
        }catch(Exception $e){

            $trans->rollBack();
            return false;
        }
    }

    protected function addEvent($data){

        $this->on(self::ADD_EVENT_DATIL,[$this,'_addDetail'],$data);
        $this->trigger(self::ADD_EVENT_DATIL);

    }

    protected function _addDetail($data){

        $cart = Cart::find()->where(['uid'=>\Yii::$app->getUser()->id])->asArray()->all();

       // echo '<pre>';print_r($cart);echo '</pre>';die();
        $ordertail = new Orderdetail();
        foreach ($cart as $v){
            foreach ($v as $c){
                $ordertail->gid = $v['goods_id'];
                $ordertail->num = $v['num'];
                $ordertail->uid = \Yii::$app->getUser()->id;
                $ordertail->oid = $data->data['orders_id'];
                $ordertail->save();
            }
        }
        Cart::deleteAll(['uid'=>\Yii::$app->user->id]);
        return true;
    }

}