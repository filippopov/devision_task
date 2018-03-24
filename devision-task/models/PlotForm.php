<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 23.3.2018 г.
 * Time: 23:10
 */

namespace app\models;

use app\components\FloatValidator;
use Yii;
use yii\base\Model;

class PlotForm extends Model
{
    public $name;
    public $crops;
    public $area;

    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'unique', 'targetClass' => '\app\models\Tractor', 'message' => 'This tractor name has already been taken.'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['crops', 'trim'],
            ['crops', 'required'],
            ['crops', 'string', 'min' => 2, 'max' => 255],
            ['area', 'required'],
            ['area', FloatValidator::className()]
        ];
    }

    public function createPlot(Plot $plot)
    {
        if (!$this->validate()) {
            return null;
        }

        if (!$plot->createPlot($this->name, $this->crops, $this->area)) {
            $this->addError('name', 'Can\'t create plot');
        }

        return true;
    }
}