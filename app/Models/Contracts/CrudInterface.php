<?php

namespace App\Models\Contracts;


Interface CrudInterface{


    public function create(array $date) : int;

    public function find($id) : object;

    public function get($columns,array  $where ) : array;

    public function update(array $data,array  $where) : int;

    public function delete(array $where) : int;
    
}