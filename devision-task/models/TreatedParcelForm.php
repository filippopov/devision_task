<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 24.3.2018 г.
 * Time: 13:35
 */

namespace app\models;

use app\components\AreaValidation;
use app\components\FloatValidator;
use Faker\Provider\zh_CN\DateTime;
use Yii;
use yii\base\Model;

class TreatedParcelForm extends Model
{

    public $plotId;
    public $tractorId;
    public $date;
    public $area;

    public function rules()
    {
        return [
            ['plotId', 'required'],
            ['tractorId', 'required'],
            ['date', 'required'],
            [['date'], 'date', 'format' => 'php:Y-m-d H:i:s', 'min' => (new \DateTime('now'))->format('Y-m-d H:i:s')],
            ['area', 'required'],
            ['area', FloatValidator::className()],
            ['area', AreaValidation::className()]
        ];
    }

    public function addData(PlotTractor $plotTractor)
    {
        if (!$this->validate()) {
            return null;
        }

        if ($plotTractor->addData($this->plotId, $this->tractorId, $this->area, $this->date)) {
            $this->addError('plotId', 'Can\'t add data');
        }

        return true;
    }
}