<?php

namespace app\modules\api\resources;

use app\models\User;

class UserResources extends User
{
    public function fields()
    {
        return ['id', 'username', 'access_token'];
    }
}