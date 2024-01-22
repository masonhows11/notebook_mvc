<?php


namespace App\Utilities;


class Url
{

    public static function currentUrl()
    {
        return (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public static function current_route()
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    //    public static function segmentUrl()
    //    {
    //        return  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //    }

}