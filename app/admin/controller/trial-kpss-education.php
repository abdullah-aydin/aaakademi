<?php

// select

// KPSS GK GY QUERY
// select
$trials_kpss = $db->from('trials_kpss')
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

    global $trials_kpss;
    $deneme_kpss = $trials_kpss[$param];

    $topPuan=0;
    $matPuan=0;
    $turPuan =0;
    $tarPuan=0;
    $cogPuan=0;
    $vatPuan=0;

    $math_true =$deneme_kpss['math_true'];
    $math_false =$deneme_kpss['math_false'];
    $turkish_true =$deneme_kpss['turkish_true'];
    $turkish_false =$deneme_kpss['turkish_false'];
    $history_true =$deneme_kpss['history_true'];
    $history_false =$deneme_kpss['history_false'];
    $geography_true =$deneme_kpss['geography_true'];
    $geography_false =$deneme_kpss['geography_false'];
    $citizenship_true =$deneme_kpss['citizenship_true'];
    $citizenship_false =$deneme_kpss['citizenship_false'];

    $math_net =net_hesaplama($math_true,$math_false);
    $turkish_net  =net_hesaplama($turkish_true,$turkish_false);
    $history_net  =net_hesaplama($history_true,$history_false);
    $geography_net  =net_hesaplama($geography_true,$geography_false);
    $citizenship_net  =net_hesaplama($citizenship_true,$citizenship_false);
    $topNetKpss = ($math_net+$turkish_net+$history_net+$geography_net+$citizenship_net);


    $matPuan=((((($math_net-7.92)/5.4022)*10)+50)*4);
    $turPuan=((((($turkish_net-3.83)/4.3040)*10)+50)*4);
    $tarPuan=((((($history_net-3.96)/2.7011)*10)+50)*1);
    $cogPuan=((((($geography_net-3.28)/2.5870)*10)+50)*1);
    $vatPuan=((((($citizenship_net-3.28)/2.5870)*10)+50)*1);

    $topPuan=100+(400*(($matPuan+$turPuan+$tarPuan+$cogPuan+$vatPuan)-379.33))/(1253.483-379.33);

    $puan =  number_format((float)round($topPuan, 2), 2, '.', '');
    return ['puan' => $puan, 'net' => $topNetKpss];
}

//KPSS EDUCATION QUERY

$trials_education = $db->from('trials_education')
    ->where('user_id', session('user_id'))
    ->orderBy('id', 'DESC')
    ->all();


function education_puan_hesaplama($param){

    global $trials_education;
    $deneme_education = $trials_education[$param];

    $dpPuan=0;
    $lpPuan=0;
    $pdPuan =0;
    $guiPuan=0;
    $maePuan=0;
    $tpamPuan=0;

    $dp_true =$deneme_education['developmental_psychology_true'];
    $dp_false =$deneme_education['developmental_psychology_false'];
    $lp_true =$deneme_education['learning_psychology_true'];
    $lp_false =$deneme_education['learning_psychology_false'];
    $pd_true =$deneme_education['program_development_true'];
    $pd_false =$deneme_education['program_development_false'];
    $gui_true =$deneme_education['guidance_true'];
    $gui_false =$deneme_education['guidance_false'];
    $mae_true =$deneme_education['measurement_and_evaluation_true'];
    $mae_false =$deneme_education['measurement_and_evaluation_false'];
    $tpam_true =$deneme_education['teaching_principles_and_methods_true'];
    $tpam_false =$deneme_education['teaching_principles_and_methods_false'];

    $dp_net =net_hesaplama($dp_true,$dp_false);
    $lp_net  =net_hesaplama($lp_true,$lp_false);
    $pd_net  =net_hesaplama($pd_true,$pd_false);
    $gui_net  =net_hesaplama($gui_true,$gui_false);
    $mae_net  =net_hesaplama($mae_true,$mae_false);
    $tpam_net  =net_hesaplama($tpam_true,$tpam_false);
    $topNetEducation = ($dp_net+$lp_net+$pd_net+$gui_net+$mae_net+$tpam_net);

    $dpPuan=((((($dp_net-7.92)/5.4022)*10)+50)*4);
    $lpPuan=((((($lp_net-3.83)/4.3040)*10)+50)*4);
    $pdPuan=((((($pd_net-3.96)/2.7011)*10)+50)*1);
    $guiPuan=((((($gui_net-3.28)/2.5870)*10)+50)*1);
    $maePuan=((((($mae_net-3.28)/2.5870)*10)+50)*1);
    $tpamPuan=((((($tpam_net-3.28)/2.5870)*10)+50)*1);

    $topPuan=100+(400*(($dpPuan+$lpPuan+$pdPuan+$guiPuan+$maePuan+$tpamPuan)-379.33))/(1253.483-379.33);

    $puan = number_format((float)round($topPuan, 2), 2, '.', '');
    return ['puan' => $puan, 'net' => $topNetEducation];
}


$menu_active = 'trial';
require admin_view('/trials/trial-kpss-education');