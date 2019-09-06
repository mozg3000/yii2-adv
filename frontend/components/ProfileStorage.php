<?php


namespace frontend\components;


interface ProfileStorage
{
    public function find($name):?string;
}