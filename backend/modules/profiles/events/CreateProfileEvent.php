<?php


namespace backend\modules\profiles\events;


use backend\modules\profiles\entities\Profile;
use yii\base\Event;

class CreateProfileEvent extends Event
{

    /**
     * @var Profile
     */
    private $profile;

    public function __construct(Profile $profile, $config = [])
    {
        $this->profile = $profile;
        parent::__construct($config);
    }

    /**
     * @return Profile
     */
    public function getProfile(): Profile
    {
        return $this->profile;
    }
}