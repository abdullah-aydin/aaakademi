<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

$menu_active = 'index';
require admin_view('index');