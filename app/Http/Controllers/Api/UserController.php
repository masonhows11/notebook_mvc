<?php


namespace APP\Http\Controllers\Api;

use APP\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index(){
        echo 'hi this is index of user controller';
    }


    public function create(){
        echo 'hi this is create of user controller';
    }

    public function store(){
        echo 'hi this is  store of user controller';
    }

    public function edit($id){
        echo 'hi this is edit of user controller';
    }

    public function update($id){
        echo 'hi this is update of user controller';
    }

    public function delete($id){
        echo 'hi this is delete of user controller';
    }


}