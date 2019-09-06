<?php


namespace backend\controllers\actions;

use yii\base\Action;

class ProfileAction extends Action
{
    public function run(){

        $user = \Yii::$app->user->getIdentity();

        return $this->controller->render('profile',['model'=>$user]);
    }
}