<?php

session_start();
ob_start();
date_default_timezone_set('Europe/Istanbul');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$config = require __DIR__ . '/config.php';

function LoadClasses($className)
{
    require PATH . '/app/classes/' . strtolower($className) . '.php';
}

spl_autoload_register('LoadClasses');

require __DIR__ . '/db.php';
require __DIR__ . '/settings.php';

foreach (glob(PATH . '/app/helpers/*.php') as $helpersFile) {
    require $helpersFile;
}