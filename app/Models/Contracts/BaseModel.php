<?php


namespace App\Models\Contracts;


abstract class BaseModel implements CrudInterface
{
    protected $connection;
    protected $table;
    protected $primaryKey = 'id';
    protected $pageSize = 10;
    protected $attributes = [];

    //    protected function __construct()
    //    {
    //
    //    }


    public function getAttribute($key)
    {
        if (!$key || !array_key_exists($key, $this->attributes)) {
            return null;
        }
        return $this->attributes[$key];
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    // for read or get property dont define in model
    public function __get($name)
    {
        return $this->getAttribute($name);
    }

    // for set new value for property dont define in model
    public function __set($name, $value)
    {
        if (!array_key_exists($name, $this->attributes)) {
            return null;
        }
        $this->attributes[$name] = $value;
    }


}