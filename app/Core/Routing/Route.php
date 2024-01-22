<?php


namespace App\Core\Routing;


class Route
{
    private static $routes = [];

    public static function add($methods, $uri, $action = null,$middleware = [])
    {
        $methods = is_array($methods) ? $methods : [$methods];
        self::$routes[] = ['methods' => $methods, 'uri' => $uri, 'action' => $action,'middleware' => $middleware];

    }

    // get http method
    public static function get($uri, $action = null,$middleware = [])
    {
        self::add('get', $uri, $action ,$middleware);
    }

    // post http method
    public static function post($uri, $action = null,$middleware = [])
    {
        self::add('post', $uri, $action,$middleware );
    }

    // put http method
    public static function put($uri, $action = null,$middleware = [])
    {
        self::add('put', $uri, $action ,$middleware);
    }

    // patch http method
    public static function patch($uri, $action = null,$middleware = [])
    {
        self::add('patch', $uri, $action,$middleware );
    }

    // delete http method
    public static function delete($uri, $action = null,$middleware = [])
    {
        self::add('delete',$uri, $action ,$middleware);
    }

    //// return routes
    public static function routes()
    {
        return self::$routes;
    }
}