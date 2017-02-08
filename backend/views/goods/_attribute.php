<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
$val = \common\models\Value::find()->asArray()->all();
$mat = \common\models\Material::find()->asArray()->all();
$obj = \common\models\Object::find()->asArray()->all();
$col = \common\models\Color::find()->asArray()->all();
$hol = \common\models\Holiday::find()->asArray()->all();
$mod = \common\models\Design::find()->asArray()->all();

$value = \yii\helpers\ArrayHelper::map($val,'id','vname');
$material = \yii\helpers\ArrayHelper::map($mat,'id','mname');
$object = \yii\helpers\ArrayHelper::map($obj,'id','oname');
$color = \yii\helpers\ArrayHelper::map($col,'id','coname');
$holiday = \yii\helpers\ArrayHelper::map($hol,'id','hname');
$models = \yii\helpers\ArrayHelper::map($mod,'id','moname');


?>
<?=$form->field($model,'value')->dropDownList($value,['prompt' => '|---请下拉选择'])?>


<?=$form->field($model,'material')->dropDownList($material,['prompt' => '|---请下拉选择'])?>


<?=$form->field($model,'object')->dropDownList($object,['prompt' => '|---请下拉选择'])?>


<?=$form->field($model,'models')->dropDownList($models,['prompt' => '|---请下拉选择'])?>


<?=$form->field($model,'color')->dropDownList($color,['prompt' => '|---请下拉选择'])?>


<?=$form->field($model,'holiday')->dropDownList($holiday,['prompt' => '|---请下拉选择'])?>


<?=$form->field($model,'isshow')->dropDownList(['10'=>'是','1'=>'否'],['prompt' => '|---请下拉选择'])?>


<?=$form->field($model,'istime')->dropDownList(['10'=>'是','1'=>'否'],['prompt' => '|---请下拉选择'])?>

<?=$form->field($model,'isrecommend')->dropDownList(['10'=>'是','1'=>'否'],['prompt' => '|---请下拉选择'])?>


<?=$form->field($model,'isbanner')->dropDownList(['10'=>'是','1'=>'否'],['prompt' => '|---请下拉选择'])?>

