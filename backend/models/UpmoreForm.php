<?php
/**
 * @see https://github.com/craftsmann.
 * @author craftsmann <m13993334619@163.com>
 */
namespace backend\models;
use yii\base\Model;

class UpmoreForm extends Model
{
    public $images;

    public function rules()
    {
        return [
            [['images'], 'file','skipOnEmpty' => false,],
        ];
    }


}