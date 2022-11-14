<?php

namespace app\modules\api\models;

use app\modules\api\resources\UserResources;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['username', 'unique',
                'targetClass' => UserResources::class,
                'message' => 'This username has already been taken.'
            ],
            [['username', 'password', 'password_repeat'], 'required'],
            ['password', 'compare', 'compareAttribute' => 'password_repeat']
        ];
    }

    public function register()
    {
        $this->_user = new UserResources();
        if ($this->validate()) {
            $this->_user->username = $this->username;
            $this->_user->password_hash = \Yii::$app->security->generatePasswordHash($this->password);
            $this->_user->access_token = \Yii::$app->security->generateRandomString(256);
            if ($this->_user->save()){
                return true;
            }
            return false;
        }
        return false;
    }
}