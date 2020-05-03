<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

// select

if (session('user_class') <= 8){
    require admin_controller('trial-lgs');
} elseif (session('user_class') >= 9){
    require admin_controller('trial-tyt');
}