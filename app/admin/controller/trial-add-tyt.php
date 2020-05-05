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
    $science_true=post('science_true');
    $science_false=post('science_false');
    $science_description=post('science_description');
    $turkish_true=post('turkish_true');
    $turkish_false=post('turkish_false');
    $turkish_description=post('turkish_description');
    $history_true=post('history_true');
    $history_false=post('history_false');
    $history_description=post('history_description');
    $religion_true=post('religion_true');
    $religion_false=post('religion_false');
    $religion_description=post('religion_description');
    $english_true=post('english_true');
    $english_false=post('english_false');
    $english_description=post('english_description');



    $query = $db->insert('trials')
        ->set(array(
            'user_id' => session('user_id'),
            'trial_name' => $trial_name,
            'math_true' => $math_true,
            'math_false' => $math_false,
            'math_description'=> $math_description,
            'science_true'=> $science_true,
            'science_false'=> $science_false,
            'science_description'=> $science_description,
            'turkish_true'=> $turkish_true,
            'turkish_false'=> $turkish_false,
            'turkish_description'=> $turkish_description,
            'history_true'=> $history_true,
            'history_false'=> $history_false,
            'history_description'=> $history_description,
            'religion_true'=> $religion_true,
            'religion_false'=> $religion_false,
            'religion_description'=> $religion_description,
            'english_true'=> $english_true,
            'english_false'=> $english_false,
            'english_description'=> $english_description
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

require admin_view('trials/trial-add-lgs');
