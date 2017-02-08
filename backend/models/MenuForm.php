<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;


use common\models\Menu;

class MenuForm extends BaseModel
{
    const SCENARIO_MENU_ADD = 'add';
    const SCENARIO_MENU_UPDATE = 'update';
    public $name;
    public $order;
    public $route;
    public $data;
    public $pid;
    public $id;

    /**
     * 规则
     * @return array
     */
    public function rules()
    {
        return [
            [['id','name','order','type'],'required'],
            ['name','string'],
            ['order','integer'],
            [['data','route'],'safe'],
            ['route','default','value'=>'#'],
            ['pid','filter','filter'=>'intval','skipOnArray'=>true],
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_MENU_ADD=>['name','pid','order','data','route'],
            self::SCENARIO_MENU_UPDATE=>['id','name','pid','order','data','route'],
        ];
    }

    /**
     * 处理用户数据修改
     * @return bool
     */
    public  function addHandle($type){

        if (!$this->validate()) {
            return false;
        }
        $menu = new Menu();
        $menu->name = $this->name;
        $menu->type = $type;
        $menu->order = (int)$this->order;
        $menu->pid = (int)$this->pid;
        $menu->route=(string)$this->route;
        $menu->data = $this->data;

        return $menu->save()?true:false;
    }

    public function updateHandle(){
        if(!$this->validate()){
            return false;
        }
        $menu = Menu::find()->where(['id'=>$this->id])->one();
        $menu->name= $this->name;
        $menu->order = (int)$this->order;
        $menu->pid = (int)$this->pid;
        $menu->route=(string)$this->route;
        $menu->data = $this->data;

        return $menu->save()?true:false;
    }
    /**
     * 属性
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'pid' => '父级',
            'order' => '排序',
            'data' => 'icon',
            'route' => '路由',
        ];
    }
}