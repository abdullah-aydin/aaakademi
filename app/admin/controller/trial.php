<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

// select

if (session('user_class') <= 8){
    require admin_controller('trial-lgs');
} elseif (session('user_class') >= 9 && session('user_class') < 80){
    require admin_controller('trial-yks');
} elseif (session('user_class') == 80){
    require admin_controller('trial-kpss');
} elseif (session('user_class') == 81){
    require admin_controller('trial-kpss-education');
}