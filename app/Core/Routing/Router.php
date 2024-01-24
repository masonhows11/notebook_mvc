<?php


namespace App\Core\Routing;


use App\Core\Request;
use App\Http\Middleware\GlobalMiddleware;
use App\Utilities\Url;

class Router
{


    private $request;
    private $routes;
    private $current_route;
    const BASE_CONTROLLER = 'App\Http\Controllers\\';


    public function __construct()
    {
        $this->request = new Request();
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;
        # run middleware
        //  $this->run_route_middleware();
        //   $this->run_global_middleware();
    }

    private function run_global_middleware()
    {
        $global_middleware = new GlobalMiddleware();
        $global_middleware->handle();
    }


    private function run_route_middleware()
    {
        $middleware = $this->current_route['middleware'];
        foreach ($middleware as $middleware_class) {
            $middlewareObject = new $middleware_class;
            // this handle() method define in our middleware class
            // execute handle() method in our middleware class
            $middlewareObject->handle();
        }
        die();
    }

    public function findRoute(Request $request)
    {
        // echo  $request->getMethod() . " " . $request->getUri();
        //        foreach ($this->routes as $route) {
        //            if (in_array($request->getMethod(), $route['methods']) && $request->getUri() == $route['uri']) {
        //                return $route;
        //            }
        //        }
        //        return null;
        foreach ($this->routes as $route) {
            if (!in_array($request->getMethod(), $route['methods'])) {
               continue;
            }
            if ($this->regex_match_route_pattern($route)) {
                return $route;
            }
        }
        return null;
    }

    public function regex_match_route_pattern($route)
    {
        // $route_pattern = '/^\/post\/(?<slug>[-%\w]+)$/';
        global $request;
        $pattern = "/^" . str_replace(['/', '{', '}'], ['\/', '(?<', '>[-%\w]+)'], $route['uri']) . "$/";
        $result = preg_match($pattern, $this->request->getUri(), $matches);
        if (!$result) {
            return false;
        }
        foreach ($matches as $key => $value) {
            if (!is_int($key)) {
                $request->add_route_param($key, $value);

            }
        }
        return true;
    }

    public function dispatch405()
    {

    }
    public function dispatch404()
    {
        header("HTTP/1.0 404 Not Found");
        // echo "404: Not Found !";
        view('errors.404');
        die();
    }
    public function run()
    {
        try {
            # 405 : invalid request method
            //        if($this->invalidRequest($this->request)){
            //            $this->dispatch405();
            //        }

            # 404 : uri not exist
            if (is_null($this->current_route)) {
                $this->dispatch404();
            }
            # run middleware if exists

            $this->dispatch($this->current_route);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
        return null;
    }

    private function dispatch($current_route)
    {
        $action = $current_route['action'];

        # action : null
        if (is_null($action) || empty($action)) {
            return;
        }
        # action : closure
        if (is_callable($action)) {
            // for execute method
            $action();
            // for execute method
            call_user_func($action);

        }
        # action  : Controller@method
        if (is_string($action))
            $action = explode('@', $action);


        # action : ['Controller','method']
        if (is_array($action)) {
            // find & make class of controller
            $class_name = self::BASE_CONTROLLER . $action[0];
            if (!class_exists($class_name)) {
                throw new \Exception("Class $class_name Not Exists !");
            }
            $controller = new $class_name();
            // find & call method of controller
            $method_name = $action[1];
            if (!method_exists($controller, $method_name)) {
                throw new \Exception("Method $method_name Does Not Exists in $class_name !");
            }
            // this is dynamic call of method
            $controller->{$method_name}();
        }


    }
}