<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 13:19
 */

namespace backend\modules\profiles\services;


use backend\modules\profiles\entities\Profile;
use backend\modules\profiles\events\CreateProfileEvent;
use backend\modules\profiles\events\EventCreateProfile;
use backend\modules\profiles\events\ProfileEvents;
use backend\modules\profiles\listeners\CreateProfileListener;
use backend\modules\profiles\models\ProfileCreateForm;
use backend\modules\profiles\services\contracts\ProfileStorage;
use backend\modules\profiles\services\dto\ProfileSaveStorageDTO;
use common\components\logger\Logger;
use Symfony\Component\EventDispatcher\EventDispatcher;
use yii\base\Event;

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

    private $eventDispatcher;
    /**
     * ProfileService constructor.
     * @param ProfileStorage $storage
     * @param Logger $logger
     */
    public function __construct(ProfileStorage $storage, Logger $logger, EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
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
        Event::on(ProfileEvents::class,ProfileEvents::PROFILE_CREATE, [\backend\modules\profiles\listeners\CreateProfileListener::class,'event']);
        Event::on(Profile::class, Profile::CREATE_PROFILE, [\backend\modules\profiles\listeners\CreateProfileListener::class,'event']);
        $dto = $this->generateDtoFromCreateForm($model);

        if($profile = $this->storage->save($dto)){

            $this->eventDispatcher->dispatch(new EventCreateProfile($profile));
            Event::trigger(Profile::class, Profile::CREATE_PROFILE, new CreateProfileEvent($profile));
            Event::trigger(ProfileEvents::class, ProfileEvents::PROFILE_CREATE, new CreateProfileEvent($profile));

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