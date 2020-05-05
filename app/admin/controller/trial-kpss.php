<?php

// select
$trials = $db->from('trials_kpss')
    ->where('user_id', session('user_id'))
    ->orderBy('id', 'DESC')
    ->all();


function net_hesaplama($true,$false){
    if($true<1){
        return $false;
    }
    return $true - ($false/4);
}

function kpss_puan_hesaplama($param){

    global $trials;
    $deneme = $trials[$param];

    $topPuan=0;
    $matPuan=0;
    $turPuan =0;
    $tarPuan=0;
    $cogPuan=0;
    $vatPuan=0;

    $math_true =$deneme['math_true'];
    $math_false =$deneme['math_false'];
    $turkish_true =$deneme['turkish_true'];
    $turkish_false =$deneme['turkish_false'];
    $history_true =$deneme['history_true'];
    $history_false =$deneme['history_false'];
    $geography_true =$deneme['geography_true'];
    $geography_false =$deneme['geography_false'];
    $citizenship_true =$deneme['citizenship_true'];
    $citizenship_false =$deneme['citizenship_false'];

    $math_net =net_hesaplama($math_true,$math_false);
    $turkish_net  =net_hesaplama($turkish_true,$turkish_false);
    $history_net  =net_hesaplama($history_true,$history_false);
    $geography_net  =net_hesaplama($geography_true,$geography_false);
    $citizenship_net  =net_hesaplama($citizenship_true,$citizenship_false);
    $topNet = ($math_net+$turkish_net+$history_net+$geography_net+$citizenship_net);


    $matPuan=((((($math_net-7.92)/5.4022)*10)+50)*4);
    $turPuan=((((($turkish_net-3.83)/4.3040)*10)+50)*4);
    $tarPuan=((((($history_net-3.96)/2.7011)*10)+50)*1);
    $cogPuan=((((($geography_net-3.28)/2.5870)*10)+50)*1);
    $vatPuan=((((($citizenship_net-3.28)/2.5870)*10)+50)*1);

    $topPuan=100+(400*(($matPuan+$turPuan+$tarPuan+$cogPuan+$vatPuan)-379.33))/(1253.483-379.33);

    $puan =  number_format((float)round($topPuan, 2), 2, '.', '');
    return ['puan' => $puan, 'net' => $topNet];
}


$menu_active = 'trial';
require admin_view('/trials/trial-kpss');