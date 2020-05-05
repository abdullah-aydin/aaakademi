<?php

if(!session('user_email'))
{
    header('location:'.admin_url('signin'));
}

if (post('submit'))
{
    $trial_name=post('trial_name');
    $math_true=post('math_true');
    $math_false=post('math_false');
    $math_description=post('math_description');
    $turkish_true=post('turkish_true');
    $turkish_false=post('turkish_false');
    $turkish_description=post('turkish_description');
    $history_true=post('history_true');
    $history_false=post('history_false');
    $history_description=post('history_description');
    $geography_true=post('geography_true');
    $geography_false=post('geography_false');
    $geography_description=post('geography_description');
    $citizenship_true=post('citizenship_true');
    $citizenship_false=post('citizenship_false');
    $citizenship_description=post('citizenship_description');


    $query = $db->insert('trials_kpss')
        ->set(array(
            'user_id' => session('user_id'),
            'trial_name' => $trial_name,
            'math_true' => $math_true?$math_true:0,
            'math_false' => $math_false?$math_false:0,
            'math_description'=> $math_description?$math_description:0,
            'turkish_true'=> $turkish_true?$turkish_true:0,
            'turkish_false'=> $turkish_false?$turkish_false:0,
            'turkish_description'=> $turkish_description?$turkish_description:0,
            'history_true'=> $history_true?$history_true:0,
            'history_false'=> $history_false?$history_false:0,
            'history_description'=> $history_description?$history_description:0,
            'geography_true'=> $geography_true?$geography_true:0,
            'geography_false'=> $geography_false?$geography_false:0,
            'geography_description'=> $geography_description?$geography_description:0,
            'citizenship_true'=> $citizenship_true?$citizenship_true:0,
            'citizenship_false'=> $citizenship_false?$citizenship_false:0,
            'citizenship_description'=> $citizenship_description?$citizenship_description:0
        ));

    if ( $query ){
        $success = 'Denemenizi başarı ile ekleniz, yönlendiriliyorsunuz...';
        header('Refresh:2;url=' . admin_url('trial'));
    }

    function validatorTrial($t, $f, $e, $total=10){
        $count = $t+$f+$e;

        if ($count<=0 && $count>$total){
            return false;
        } else {
            return true;
        }
    }

}

$menu_active = 'trial';

require admin_view('trials/trial-add-kpss');

