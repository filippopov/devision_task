<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 22.3.2018 г.
 * Time: 10:42
 */

namespace app\models;


use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => 5],
        ];
    }

    /**
     * @param User $user
     * @return User|null
     */
    public function signup(User $user)
    {
        if (!$this->validate()) {
            return null;
        }

        return $user->createUser($this->username, $this->password);
    }
}