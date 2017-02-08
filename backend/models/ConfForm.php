<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;

use backend\models\BaseModel;
use common\models\Conf;

class ConfForm extends BaseModel{
    const SCENARIO_CONF_ADD ='add';
    public $name;
    public $value;
    public $type;
    public $description;

    public function rules()
    {
        return [
            [['name','type','value','description'],'required'],
            ['type','integer'],
            ['name','string','max' => 45],
            ['description','string']
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_CONF_ADD=>['name','type','description','value']
        ];
    }

    /**
     * 添加配置处理
     * @return bool
     */
    public function addHandle(){

        if(!$this->validate()){return false;}

        $model = new Conf();
        $model->name = $this->name;
        $model->value = $this->value;
        $model->description = $this->description;
        $model->type = $this->type;
        if($model->save()){
            return true;
        }
        return false;
    }

}
