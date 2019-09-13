<?php
/**
 * Created by IntelliJ IDEA.
 * User: flashbomb
 * Date: 13.09.2019
 * Time: 11:41
 */

namespace backend\modules\profiles\services\contracts;


use backend\modules\profiles\entities\Profile;
use backend\modules\profiles\models\ProfileCreateForm;

interface ProfileService
{
    public function createProfile(ProfileCreateForm &$model):?Profile;
//    public function editProfile(ProfileCreateForm &$model):bool;
}