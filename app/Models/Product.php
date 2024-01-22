<?php


namespace App\Models;


use App\Models\Contracts\JsonBaseModel;
use App\Models\Contracts\MysqlBaseModel;

// JsonBaseModel
class Product extends MysqlBaseModel
{
    protected  $table = 'products';
}