<?php


namespace frontend\components;


use yii\helpers\ArrayHelper;

class SearchProfileService
{
//    private $profiles = ['Sergey'=>'Ivanov','Anatoliy'=>'Egorov', 'Ivan'=>'Petrov'];
    private $storage = null;

    public function __construct(ProfileStorage $storage)
    {
        $this->storage = $storage;
    }

    public function searchProfileName($name):?string{


        $name = $this->storage->find($name);

        return mb_strtoupper($name,'utf-8');
    }
}