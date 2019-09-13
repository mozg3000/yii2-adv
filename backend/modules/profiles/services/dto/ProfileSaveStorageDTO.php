<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 13:35
 */

namespace backend\modules\profiles\services\dto;


class ProfileSaveStorageDTO
{
    private $uuid;
    private $username;
    private $email;
    private $password_hash;
    private $token;
    private $auth_token;
    private $status;

    /**
     * ProfileSaveStorageDTO constructor.
     * @param $uuid
     * @param $username
     * @param $email
     * @param $password_hash
     * @param $token
     * @param $auth_token
     * @param $status
     */
    public function __construct($uuid, $username, $email, $password_hash, $token, $status, $auth_token)
    {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->token = $token;
        $this->status = $status;
        $this->auth_token = $auth_token;
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
    public function getStatus()
    {
        return $this->status;
    }

}