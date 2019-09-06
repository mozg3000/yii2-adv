<?php


namespace backend\controllers\actions;


use common\models\User;
use yii\base\Action;

class UsersAction extends Action
{
    public function run(){

        $users = User::find()-> all();

        return $this->controller->render('users',['model'=>$users]);
    }
}