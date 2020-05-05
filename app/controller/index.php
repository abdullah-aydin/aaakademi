<?php

if(!route(1)){
    $route[1]='index';
}

if(!file_exists(controller(route(1)))){
    $route[1]='index';
}

require view('index'); // TODO:: NORMALDE ROUTE 1 YAZIYOR DİNAMİK YAPINCA DEĞİŞTİR


//TODO:KULLANICI ARAYUZU EKLENIRSE BURADAN YONLENDIRILECEK