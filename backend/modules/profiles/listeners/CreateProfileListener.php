<?php


namespace backend\modules\profiles\listeners;


use backend\modules\profiles\events\CreateProfileEvent;

class CreateProfileListener
{
    public function event(CreateProfileEvent $event){

        \Yii::warning('event create profile '.$event->name.' '. $event->getProfile()->getUuid());;
    }
}