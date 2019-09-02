<?php


namespace backend\controllers\actions;


use yii\base\Action;

class NewUserAction extends Action
{
    public function run(){

        return $this->controller->render('newuser');
    }
}