<?php

namespace app\modules\api\models;

use app\modules\api\resources\UserResources;
use Yii;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends \app\models\LoginForm
{
    /**
     * Finds user by [[username]]
     *
     * @return UserResources|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserResources::findByUsername($this->username);
        }

        return $this->_user;
    }
}
