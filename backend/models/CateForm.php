<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;

use backend\models\BaseModel;
use common\models\Category;
use common\models\Conf;

class CateForm extends BaseModel{
    const SCENARIO_CATE_ADD ='add';
    public $name;
    public $pid;
    public $description;

    public function rules()
    {
        return [
            [['name','pid'],'required'],
            ['pid','integer'],
            ['name','string','max' => 45],
            ['description','string']
        ];
    }

    /**
     * 添加配置处理
     * @return bool
     */
    public function addHandle(){

        if(!$this->validate()){return false;}

        $model = new Category();
        $model->name = $this->name;
        $model->pid  = $this->pid?:0;
        $model->description = $this->description;
        if($model->save()){
            return true;
        }
        var_dump($model->getErrors());
    }

    public function updateCate(){
        if(!$this->validate()){return false;}

        $model = new Category();
        $model->name = $this->name;
        $model->pid  = $this->pid?:0;
        $model->description = $this->description;
        if($model->save()){
            return true;
        }
        var_dump($model->getErrors());
    }

}