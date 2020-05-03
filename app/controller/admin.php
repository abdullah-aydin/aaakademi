<?php

if (!route(1)) {
    $route[1] = 'index';
}

if (!file_exists(admin_controller(route(1)))) {
    $route[1] = 'index';
}

$menus = [
    [
        'url' => 'index',
        'title' => 'AnaSayfa',
        'icon' => 'nav-icon fas fa-home',
    ],
    [
        'url' => 'calendar',
        'title' => 'Ders Programı',
        'icon' => 'nav-icon far fa-calendar-alt',
    ],
    [
        'url' => 'books',
        'title' => 'Kitap',
        'icon' => 'nav-icon fas fa-book',
    ],
    [
        'url' => 'question',
        'title' => 'Soru Bankam',
        'icon' => 'nav-icon far fa-question-circle',
    ],
    [
        'url' => 'targets',
        'title' => 'Hedefler',
        'icon' => 'nav-icon fas fa-bullseye',
    ],
    [
        'url' => 'trial',
        'title' => 'Deneme',
        'icon' => 'nav-icon fas fa-book-open',
    ],
];


require admin_controller(route(1));