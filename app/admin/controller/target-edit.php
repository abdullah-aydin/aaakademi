<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}
$menu_active = 'target-edit';
require admin_view('target-edit');