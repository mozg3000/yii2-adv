<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 16.09.2019
 * Time: 16:21
 */

namespace backend\config;


use backend\modules\profiles\infrastructure\ProfileStorageMysql;
use yii\base\Application;
use yii\base\BootstrapInterface;

class PreConfig implements BootstrapInterface
{

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
//        \Yii::$container->setSingleton(ProfileStorageMysql::class,[],[\Yii::$app->db]);
    }
}