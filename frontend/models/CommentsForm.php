<?php
/**
 * @see    https://github.com/craftsmann
 * @author craftsmann <m13993334619@163.com>
 */

namespace frontend\models;



use common\models\Comments;

class CommentsForm extends BaseModel
{
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

        $model = new Comments();
        $model->goods_id = $this->goods_id;
        $model->user_id  = \Yii::$app->getUser()->id;
        $model->comment  = htmlspecialchars($this->content);
        $model->type     =  1;
        return !$model->save()?0:1;
    }
    public function attributeLabels()
    {
        return [
            'content'=>'内容'
        ];
    }

}