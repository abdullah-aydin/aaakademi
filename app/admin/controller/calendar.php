<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}
$menu_active = 'calendar';
require admin_view('calendar');