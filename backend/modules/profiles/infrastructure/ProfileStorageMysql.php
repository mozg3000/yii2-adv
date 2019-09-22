<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 14:27
 */

namespace backend\modules\profiles\infrastructure;


use backend\modules\profiles\entities\Profile;
use backend\modules\profiles\services\contracts\ProfileStorage;
use backend\modules\profiles\services\dto\ProfileSaveStorageDTO;
use yii\db\Connection;
use yii\db\Query;

class ProfileStorageMysql implements ProfileStorage
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * ProfileStorageMysql constructor.
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function save(ProfileSaveStorageDTO $DTO):?Profile
    {
        $dateCreated = date('Y-m-d H:i:s');
        $response = $this->connection->createCommand()->insert('user',
            [
                'uuid' => $DTO->getUuid(),
                'username'=> $DTO->getUsername(),
                'email' => $DTO->getEmail(),
                'auth_key' => $DTO->getAuthToken(),
                'password_hash' => $DTO->getPasswordHash(),
                'status' => $DTO->getStatus(),
                'created_at' => $dateCreated,
                'updated_at' => $dateCreated,
                'verification_token' => $DTO->getToken()

            ])->execute();
        if($response === 1){

            $id = $this->connection->getLastInsertID();

            return new Profile(
                $DTO->getUuid(),
                $id,
                $DTO->getUsername(),
                $DTO->getEmail(),
                $DTO->getPasswordHash(),
                $DTO->getToken(),
                $DTO->getAuthToken(),
                $dateCreated
            );
        }else{

            return  null;
        }
    }

    public function findProfileByUsernameAndEmail(string $username, string $email): ?Profile
    {
        $query = new Query();
        $data= $query->from('user')
                     ->orWhere([
                         'username' =>$username
                     ])->orWhere([
                         'email' => $email
                     ])
                     ->one();
        if($data){

            return Profile::fromDataDb($data);
        }
        return null;
    }
}