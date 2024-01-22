<?php


namespace App\Http\Controllers;


class UserController extends Controller
{

    public function index(){
        echo 'hi this is index of user controller' . PHP_EOL;
    }


    public function create(){
        echo 'hi this is create of user controller' . PHP_EOL;
    }

    public function store(){
        echo 'hi this is  store of user controller' . PHP_EOL;
    }

    public function edit($id){
        echo 'hi this is edit of user controller' . PHP_EOL;
    }

    public function update($id){
        echo 'hi this is update of user controller' . PHP_EOL;
    }

    public function delete($id){
        echo 'hi this is delete of user controller' . PHP_EOL;
    }


}