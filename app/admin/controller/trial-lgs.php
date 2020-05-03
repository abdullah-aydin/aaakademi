<?php

// select
$trials = $db->from('trials')
    ->where('user_id', session('user_id'))
    ->orderBy('id', 'DESC')
    ->all();


function net_hesaplama($true,$false){
    if($true<1){
        return $false;
    }
    return $true - ($false/3);
}

function lgs_puan_hesaplama($param){

    global $trials;
    $deneme = $trials[$param];

    $topPuan=0;
    $turPuan =0;
    $matPuan=0;
    $fenPuan=0;
    $inkPuan=0;
    $ingPuan=0;
    $dinPuan=0;

    $math_true =$deneme['math_true'];
    $math_false =$deneme['math_false'];
    $science_true =$deneme['science_true'];
    $science_false =$deneme['science_false'];
    $turkish_true =$deneme['turkish_true'];
    $turkish_false =$deneme['turkish_false'];
    $history_true =$deneme['history_true'];
    $history_false =$deneme['history_false'];
    $religion_true =$deneme['religion_true'];
    $religion_false =$deneme['religion_false'];
    $english_true =$deneme['english_true'];
    $english_false =$deneme['english_false'];
    $math_net =net_hesaplama($math_true,$math_false);
    $science_net  =net_hesaplama($science_true,$science_false);
    $turkish_net  =net_hesaplama($turkish_true,$turkish_false);
    $history_net  =net_hesaplama($history_true,$history_false);
    $religion_net  =net_hesaplama($religion_true,$religion_false);
    $english_net  =net_hesaplama($english_true,$english_false);

    $matPuan=((((($math_net-7.92)/5.4022)*10)+50)*4);
    $fenPuan=((((($science_net-2.68)/3.6570)*10)+50)*4);
    $turPuan=((((($turkish_net-3.83)/4.3040)*10)+50)*4);
    $inkPuan=((((($history_net-3.96)/2.7011)*10)+50)*1);
    $dinPuan=((((($religion_net-3.28)/2.5870)*10)+50)*1);
    $ingPuan=((((($english_net-3.28)/2.5870)*10)+50)*1);

    $topPuan=100+(400*(($turPuan+$matPuan+$fenPuan+$inkPuan+$ingPuan+$dinPuan)-379.33))/(1253.483-379.33);

    return number_format((float)round($topPuan, 2), 2, '.', '');

}


$menu_active = 'trial';
require admin_view('trial-lgs');