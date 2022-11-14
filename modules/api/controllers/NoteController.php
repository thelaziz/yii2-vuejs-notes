<?php

namespace app\modules\api\controllers;

use app\modules\api\resources\NoteResources;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

class NoteController extends ActiveController
{
    public $modelClass = NoteResources::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];

        return $behaviors;
    }
}