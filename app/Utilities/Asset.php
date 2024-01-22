<?php


namespace App\Utilities;


class Asset
{
    public static function get($route){

        return $_ENV['BASE_URL'] .'assets/'. $route;
    }

    public static function styles($route){
        return $_ENV['BASE_URL'] .'assets/css/'. $route;
    }

    public static function scripts($route){
        return $_ENV['BASE_URL'] .'assets/js/'. $route;
    }

    public static function images($route){
        return $_ENV['BASE_URL'] .'assets/images/'. $route;
    }

    public static function fonts($route){
        return $_ENV['BASE_URL'] .'assets/fonts/'. $route;
    }
}