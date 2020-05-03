<?php

define('PATH',realpath('.')); ///Applications/MAMP/htdocs/myWebsite - DOSYANIN BAŞLANGIÇ DİZİNİ
define('SUBFOLDER_NAME',dirname($_SERVER['SCRIPT_NAME'])); // dizin ismini alıyoruz
define('URL', 'http://' . $_SERVER['SERVER_NAME'] . (SUBFOLDER_NAME == '/' ? null : SUBFOLDER_NAME));

