<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 23.3.2018 г.
 * Time: 7:54
 */

namespace app\models;

use Yii;
use yii\base\Model;

class TractorForm extends Model
{
    public $name;

    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'unique', 'targetClass' => '\app\models\Tractor', 'message' => 'This tractor name has already been taken.'],
            ['name', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    public function createTractor(Tractor $tractor)
    {
        if (!$this->validate()) {
            return null;
        }

        if (!$tractor->createTractor($this->name)) {
            $this->addError('name', 'Can\'t create tractor');
            return false;
        }

        return true;
    }
}