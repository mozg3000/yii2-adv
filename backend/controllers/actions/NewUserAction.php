<?php


namespace backend\controllers\actions;


use common\models\User;
use yii\base\Action;

class NewUserAction extends Action
{
    public function run(){

        $user = new User();

        return $this->controller->render('newuser', ['model'=> $user]);
    }
}