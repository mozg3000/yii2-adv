<?php


namespace backend\subscribers;


use backend\modules\profiles\events\EventCreateProfile;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProfileSubscriber implements EventSubscriberInterface
{


    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * ['eventName' => 'methodName']
     *  * ['eventName' => ['methodName', $priority]]
     *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
//          EventCreateProfile::class=>'createProfile'
            EventCreateProfile::class => 'createProfile'
        ];
    }
    public function createProfile(EventCreateProfile $eventCreateProfile){

        var_dump('deshgersthrt');exit();
        \Yii::warning(sprintf("EVENT DISPATCHER %s", $eventCreateProfile->getProfile()->getUuid()));
    }
}