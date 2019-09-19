<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 9:58
 */

namespace backend\modules\profiles\models;


use yii\base\Model;

class ProfileCreateForm extends Model
{
    public $username;
    public $email;
    public $password;

    public const EVENT_USER_EXIST = 'event_user_exist';
    public function rules()
    {
        return[
          [['username','email','password'],'required'],
          ['email','email'],
          ['password','string','min'=> 5]
        ];
    }
}