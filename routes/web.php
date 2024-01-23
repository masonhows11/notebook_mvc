<?php


use App\Core\Routing\Route;
use App\Http\Middleware\BlockFireFoxMiddleware;
use App\Http\Middleware\BlockIEMiddleware;

Route::get('/',['HomeController','index'],[BlockFireFoxMiddleware::class,BlockIEMiddleware::class]);

Route::post('/store/user',['HomeController','store']);


