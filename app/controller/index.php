<?php

if(!route(1)){
    $route[1]='index';
}

if(!file_exists(admin_controller(route(1)))){
    $route[1]='index';
}

require admin_controller(route(1));


//TODO:KULLANICI ARAYUZU EKLENIRSE BURADAN YONLENDIRILECEK