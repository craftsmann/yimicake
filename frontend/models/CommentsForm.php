<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */

namespace frontend\models;



use common\models\Comments;
use common\models\Credit;
use yii\base\Exception;

class CommentsForm extends BaseModel
{
    const EVENT_ADDCOMMENTS = 'addComments';
    public $content;
    public $goods_id;
    public function rules()
    {
        return [
            [['content','goods_id'],'required'],
            ['goods_id','required'],
            ['content','string','max'=>400],
        ];
    }

    public function addData(){
        if(!$this->validate()){return null;}

        $trans = \Yii::$app->db->beginTransaction();
        try{
            $model = new Comments();
            $model->goods_id = $this->goods_id;
            $model->user_id  = \Yii::$app->getUser()->id;
            $model->comment  = htmlspecialchars($this->content);
            $model->type     =  2;
            if(!$model->save()){throw new Exception('添加评论出错');}
            $data = $model->getAttributes();
            $this->_addcreditevent($data);
            $trans->commit();
            return true;
        }catch (Exception $e){
            $trans->rollBack();
            return false;
        }
    }

    protected function _addcreditevent($data){
        $this->on(self::EVENT_ADDCOMMENTS,[$this,'_addevent'],$data);
        $this->trigger(self::EVENT_ADDCOMMENTS);
    }

    protected function _addevent($data){
        //var_dump($data);die();
        $credit =new Credit();
        $credit->content = '参与商品评论所获积分';
        $credit->uid     =  \Yii::$app->user->identity->id;
        $credit->points  =  '10';
        if(!$credit->save()){
            throw new Exception('商品评论出错');
        };
    }

    public function attributeLabels()
    {
        return [
            'content'=>'内容'
        ];
    }

}