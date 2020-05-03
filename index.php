<?php

require __DIR__ . '/app/bootstrap/init.php';

$routeExplode = explode('?', $_SERVER['REQUEST_URI']);
$route = array_values(array_filter(explode('/', $routeExplode[0])));
if (SUBFOLDER_NAME != '/'){
    array_shift($route);
}

if(!route(0)){
    $route[0]='index';
}

if (!file_exists(controller(route(0)))){
    $route[0] = '404';
}

//TODO:BAKIM MODU EKLENECEK

require controller(route(0));