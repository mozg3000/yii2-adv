<?php

namespace backend\modules\profiles\services\logger;
use common\components\logger\Logger;
use yii\mail\MailerInterface;

class LoggerProfile implements Logger
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * LoggerProfile constructor.
     * @param MailerInterface $mailer
     */
    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function log($txt)
    {
        if($this->mailer->compose()->setFrom('some@email.com')->
        setTo('another@email.com')->
        setTextBody('EVENT '. $txt)->
        send()){
            \Yii::warning('send email with text'. $txt);
        }
    }
}