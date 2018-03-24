<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 23.3.2018 г.
 * Time: 13:24
 */

namespace app\components;

use Yii;
use yii\base\Component;

class FlashMessage extends Component
{
    private $session;

    public function __construct()
    {
        $this->session = Yii::$app->session;
    }

    public function setMessage($key, $value)
    {
        $this->session[$key] = $value;
    }

    public function getMessage($key)
    {
        $message = $this->isSetMessage($key) ? $this->session[$key] : null;
        unset($this->session[$key]);
        return $message;
    }

    public function isSetMessage($key)
    {
        return isset($this->session[$key]);
    }
}