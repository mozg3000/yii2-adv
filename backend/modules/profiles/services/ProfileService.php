<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 13:19
 */

namespace backend\modules\profiles\services;


use backend\modules\profiles\entities\Profile;
use backend\modules\profiles\models\ProfileCreateForm;
use backend\modules\profiles\services\contracts\ProfileStorage;
use backend\modules\profiles\services\dto\ProfileSaveStorageDTO;
use common\components\logger\Logger;
use Faker\Provider\Uuid;

class ProfileService implements \backend\modules\profiles\services\contracts\ProfileService
{
    /**
     * @var ProfileStorage
     */
    private $storage;
    /**
     * @var Logger
     */
    private $logger;

    /**
     * ProfileService constructor.
     * @param ProfileStorage $storage
     * @param Logger $logger
     */
    public function __construct(ProfileStorage $storage, Logger $logger)
    {
        $this->storage = $storage;
        $this->logger = $logger;
    }

    public function createProfile(ProfileCreateForm &$model): ?Profile
    {
        $model->on($model::EVENT_USER_EXIST, function ($event){
            \Yii::warning('send message of event '. $event->name);
        });
        $model->on($model::EVENT_USER_EXIST, function ($event){
            $this->logger->log('send message INFO, event: '.$event->name);
        });

        if(!$model->validate()){

            return null;
        }
        if($this->storage->findProfileByUsernameAndEmail($model->username,$model->email)){

            $model->addError('username','Пользователь с таким именем или емейлом уже есть в системе');

            $model->trigger($model::EVENT_USER_EXIST);

            return null;
        }
        $dto = $this->generateDtoFromCreateForm($model);
        if($profile = $this->storage->save($dto)){

            return $profile;
        }else{

            return null;
        }
    }
    public function generateDtoFromCreateForm(ProfileCreateForm $form):ProfileSaveStorageDTO{

        $dto = new ProfileSaveStorageDTO(
            (string)\Ramsey\Uuid\Uuid::uuid4(),
            $form->username,
            $form->email,
            \Yii::$app->security->generatePasswordHash($form->password),
            \Yii::$app->security->generateRandomString(),
            10,
            \Yii::$app->security->generateRandomString()
            );

        return $dto;
    }

}