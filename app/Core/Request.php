<?php

namespace App\Core;


Class Request{

    private $route_params;
    private $params;
    private $method;
    private $agent;
    private $ip;
    private $uri;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->uri = strtok($_SERVER['REQUEST_URI'],'?');
    }
    //// Uri
    public function getUri()
    {
        return $this->uri;
    }

    //// method
    public function getMethod()
    {
        return $this->method;
    }
    public function setMethod($method)
    {
        $this->method = $method;
    }

    //// agent
    public function getAgent()
    {
        return $this->agent;
    }
    public function setAgent($agent)
    {
        $this->agent = $agent;
    }

    //// ip
    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    //// parameters
    public function getParams()
    {
        return $this->params;
    }
    public function setParams($params)
    {
        $this->params = $params;
    }


    public function inputKey($key)
    {
        return $this->params[$key] ?? null;
    }
    public function issetKey($key)
    {
        return  isset($this->params[$key]);
    }

    public function redirect($path)
    {
        header("Location: " . site_url($path));
        die();
    }

    // for add parameters to route_params array
    public function add_route_param($key,$value){
        $this->route_params[$key] = $value;
    }
    // for get parameters from route_params array
    public function get_route_param($key){
       return  $this->route_params[$key];
    }

    // for get all parameters from route_params array
    public function get_route_params(){
        return  $this->route_params;
    }



}