<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\controllers;

use backend\models\ConfForm;
use common\models\Conf;
use yii\base\Exception;
use yii\db\Query;
use Yii;

class ConfigController extends BaseController
{

    /**
     * 站点配置
     * @return string
     */
    public function actionWebconf(){

        $model = Conf::find()->where(['type'=>1])->asArray()->all();
        $this->handleData('config/webconf');
        return $this->render('webconf',['model'=>$model]);
    }

    public function actionUpwebconf(){
        if(Yii::$app->request->isPost){
            $id = $_POST['Conf']['id'];
            $name = $_POST['Conf']['name'];

            $arr = array_combine($id,$name);
            $trans = Yii::$app->db->beginTransaction();
            try{
                foreach ($arr as $k=>$v){
                    Yii::$app->db->createCommand()->update('{{%conf}}', ['value' => $v], 'id = "'.$k.'"')->execute();
                }
                $trans->commit();
                return $this->redirect(['webconf']);
            }catch (\Exception $e){
                $trans->rollBack();
            }
        }
    }
    public function actionAddconf(){

        $model = new ConfForm();
        $model->setScenario(ConfForm::SCENARIO_CONF_ADD);
        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post()) && $model->addHandle()){
                return json_encode([
                    'msg'    =>'添加配置成功',
                    'status' =>'success'
                ]);
            }else{
                return json_encode([
                    'msg'    =>'添加配置失败,请检查字段',
                    'status' =>'error'
                ]);
            }
        }
        return $this->render('addconf');
    }

    /**
     * 自定义配置
     * @return string
     */
    public function actionOwnconf(){

        $query = new Query();
        $model = $query
                 ->select('*')
                 ->from('{{%conf}}')
                 ->where('type=:type',[':type'=>2])
                 ->all();
        $this->handleData('config/ownconf');

        return $this->render('ownconf',['model'=>$model]);
    }

    public function actionOtherconf(){

        $model = Yii::$app->db->createCommand("SELECT * FROM {{%conf}} WHERE type=:type")
               ->bindValue(':type',3)
               ->queryAll();
        $this->handleData('config/otherconf');

        return $this->render('otherconf',['model'=>$model]);

    }

    /**
     * 处理post数据
     * @return \yii\web\Response
     */
    private function handleData($url){
        if(Yii::$app->request->isPost){
            $id = $_POST['Conf']['id'];
            $name = $_POST['Conf']['name'];

            $arr = array_combine($id,$name);
            $trans = Yii::$app->db->beginTransaction();
            try{
                foreach ($arr as $k=>$v){
                    Yii::$app->db->createCommand()->update('{{%conf}}', ['value' => $v], 'id = "'.$k.'"')->execute();
                }
                $trans->commit();
                return $this->redirect([$url]);
            }catch (\Exception $e){
                $trans->rollBack();
            }
        };
    }

}