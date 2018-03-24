<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 24.3.2018 г.
 * Time: 12:05
 */

namespace app\components;

use Yii;
use yii\validators\Validator;

class FloatValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if (!filter_var($model->{$attribute}, FILTER_VALIDATE_FLOAT)) {
            $this->addError($model, $attribute, 'Please enter number');
        }
    }
}