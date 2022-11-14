<?php
/**
 * User: User
 * Date: 14/11/2022
 * Time: 16:48 PM
 */

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Class AppController
 *
 * @author User User <user@gmail.com>
 * @package app\commands
 */
class AppController extends Controller
{
    public function actionAddUser($username, $password)
    {
        $user = new User();
        $user->username = $username;
        $user->password_hash = \Yii::$app->security->generatePasswordHash($password);
        $user->access_token = \Yii::$app->security->generateRandomString(256);
        if ($user->save()){
            Console::output('Success');
        } else {
            Console::output('Fail');
            var_dump($user->errors);
        }
    }
}