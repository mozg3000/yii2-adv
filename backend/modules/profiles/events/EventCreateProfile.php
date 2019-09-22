<?php


namespace backend\modules\profiles\events;


use backend\modules\profiles\entities\Profile;
use Symfony\Contracts\EventDispatcher\Event;

class EventCreateProfile extends Event
{
    private $profile;

    /**
     * EventCreateProfile constructor.
     * @param $profile
     */
    public function __construct($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getProfile():Profile
    {
        return $this->profile;
    }


}