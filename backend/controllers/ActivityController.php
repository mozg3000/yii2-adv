<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 08.09.2019
 * Time: 10:13
 */

namespace backend\controllers;


use backend\models\Activity;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\rest\Controller;

class ActivityController extends ActiveController
{
    public $modelClass = Activity::class;

    public function behaviors()
    {
        $beh = parent::behaviors();
        $beh['authorization'] = ['class'=>HttpBearerAuth::class];

        return $beh;
    }
}