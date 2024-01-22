<?php


namespace App\Models;


// use App\Models\Contracts\JsonBaseModel;
use App\Models\Contracts\MysqlBaseModel;

// JsonBaseModel
class User extends MysqlBaseModel
{
    protected  $table = 'users';

}