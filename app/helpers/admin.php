<?php

function admin_controller($controllerName)
{
    $controllerName = strtolower($controllerName);
    return PATH . '/app/admin/controller/' . $controllerName . '.php';
}

function admin_view($viewName)
{
    $viewName = strtolower($viewName);
    return PATH . '/app/admin/view/' . $viewName . '.php';
}

function admin_url($url = false)
{
    return URL . '/admin/'. $url;
}

function admin_assets_url($url = false)
{
    return URL .'/app/admin/assets/' . $url;
}

function session($name)
{
    return isset($_SESSION[$name]) ? $_SESSION[$name] : false;
}

