<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 24.3.2018 г.
 * Time: 13:45
 */

namespace app\components;

use app\models\Plot;
use Yii;
use yii\validators\Validator;

class AreaValidation extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $plot = Plot::find()
            ->where(['id' => $model->plotId])
            ->select('area')
            ->one();

        if (!$plot) {
            $this->addError($model, $attribute, 'Not set plot');
        }

        if ($model->{$attribute} > $plot->area) {
            $this->addError($model, $attribute, 'Enter area is too big, Please enter valid number');
        }
    }
}