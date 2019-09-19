<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 12:43
 */

namespace backend\modules\profiles\entities;


use yii\helpers\ArrayHelper;

class Profile
{
    private $uuid;
    private $id;
    private $username;
    private $email;
    private $status;
    private $password_hash;
    private $token;
    private $auth_token;
    private $createdAt;


    public const CREATE_PROFILE = 'create_profile';
    /**
     * Profile constructor.
     * @param $uuid
     * @param $id
     * @param $username
     * @param $email
     * @param $password_hash
     * @param $token
     * @param $auth_token
     * @param $createdAt
     */
    public function __construct($uuid, $id, $username, $email, $password_hash, $token, $auth_token, $createdAt)
    {
        $this->uuid = $uuid;
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->token = $token;
        $this->auth_token = $auth_token;
        $this->createdAt = $createdAt;
    }
    public static function fromDataDb(array $data):self{

        return new self(
            ArrayHelper::getValue($data, 'uuid'),
            ArrayHelper::getValue($data, 'id'),
            ArrayHelper::getValue($data, 'username'),
            ArrayHelper::getValue($data, 'email'),
            ArrayHelper::getValue($data, 'password_hash'),
            ArrayHelper::getValue($data, 'verification_token'),
            ArrayHelper::getValue($data, 'auth_key'),
            ArrayHelper::getValue($data, 'created_at')
        );
    }
    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->password_hash;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return mixed
     */
    public function getAuthToken()
    {
        return $this->auth_token;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

}