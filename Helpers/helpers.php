<?php

function site_url($route)
{
    return $_ENV['BASE_URL'] . $route;
}

function asset_url($route = '')
{
    return site_url("assets/" . $route);
}

//function asset_css($route)
//{
//    return site_url("public/assets/" . $route);
//}
//
//function asset_js($route)
//{
//    return site_url("public/assets/" . $route);
//}

function random_element($array)
{
    shuffle($array);
    return array_pop($array);
}

function view($path, $data = [])
{
    extract($data);
    $path = str_replace('.', '/', $path);
    $view_full_path = BASE_PATH . "resources/views/$path.php";
    include_once $view_full_path;

}

function strContains($str, $needle, $case, $case_sensitive = 0)
{
    if ($case_sensitive) {
        $pos = strpos($str, $needle);
    } else {
        $pos = stripos($str, $needle);
    }
    return ($pos !== false) ? true : false;
}


function nice_dump($var)
{
    echo '<pre style="display: block; text-align: left;direction: ltr;background-color: #fff;border:4px solid red;border-radius: 5px;padding: 20px" />';
    var_dump($var);
    echo '</pre>';
}

//function xss_clean($str){
//    return filter_var(htmlspecialchars($str),FILTER_SANITIZE_STRING);
//}

function nice_dd($var)
{
    nice_dump($var);
    die();
}


