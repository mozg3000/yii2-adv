<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 10:19
 */

namespace backend\modules\profiles\controllers;


use backend\modules\profiles\base\BaseController;
use backend\modules\profiles\controllers\actions\CreateAction;
use backend\modules\profiles\infrastructure\ProfileStorageMysql;
use backend\modules\profiles\models\ProfileCreateForm;
use backend\modules\profiles\services\contracts\ProfileService;
use backend\modules\profiles\services\dto\ProfileSaveStorageDTO;

class ProfileController extends BaseController
{
    /**
     * @var ProfileService
     */
    public $service;

    public function __construct(string $id, $module, ProfileService $service, array $config = [])
    {
        //$connection = \Yii::$app->db;
//        print_r($connection);exit();
        //$storage = new ProfileStorageMysql($connection);
        $this->service = $service;

        parent::__construct($id, $module, $config);
    }
    public function actions()
    {
        return [
            'create'=>['class'=>CreateAction::class]
        ];
    }
}