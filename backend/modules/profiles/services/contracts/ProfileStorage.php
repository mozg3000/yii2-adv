<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 13:25
 */

namespace backend\modules\profiles\services\contracts;


use backend\modules\profiles\entities\Profile;
use backend\modules\profiles\services\dto\ProfileSaveStorageDTO;

interface ProfileStorage
{
    public function save(ProfileSaveStorageDTO $DTO):?Profile;
//    public function edit();
    public function findProfileByUsernameAndEmail(string $username, string $email):?Profile;
//    public function findProfileByUuid();
}