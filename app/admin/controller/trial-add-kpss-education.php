<?php

if(!session('user_email'))
{
    header('location:'.admin_url('signin'));
}

if (post('submit'))
{
    $trial_name=post('trial_name');
    $dp_true =post('developmental_psychology_true');
    $dp_false =post('developmental_psychology_false');
    $dp_description=post('developmental_psychology_description');
    $lp_true =post('learning_psychology_true');
    $lp_false =post('learning_psychology_false');
    $lp_description=post('learning_psychology_description');
    $pd_true =post('program_development_true');
    $pd_false =post('program_development_false');
    $pd_description=post('program_development_description');
    $gui_true =post('guidance_true');
    $gui_false =post('guidance_false');
    $gui_description=post('guidance_description');
    $mae_true =post('measurement_and_evaluation_true');
    $mae_false =post('measurement_and_evaluation_false');
    $mae_description=post('measurement_and_evaluation_description');
    $tpam_true =post('teaching_principles_and_methods_true');
    $tpam_false =post('teaching_principles_and_methods_false');
    $tpam_description=post('teaching_principles_and_methods_description');

    $query = $db->insert('trials_education')
        ->set(array(
            'user_id' => session('user_id'),
            'trial_name' => $trial_name,
            'developmental_psychology_true' => $dp_true,
            'developmental_psychology_false' => $dp_false,
            'developmental_psychology_description'=> $dp_description,
            'learning_psychology_true'=> $lp_true,
            'learning_psychology_false'=> $lp_false,
            'learning_psychology_description'=> $lp_description,
            'program_development_true'=> $pd_true,
            'program_development_false'=> $pd_false,
            'program_development_description'=> $pd_description,
            'guidance_true'=> $gui_true,
            'guidance_false'=> $gui_false,
            'guidance_description'=> $gui_description,
            'measurement_and_evaluation_true'=> $mae_true,
            'measurement_and_evaluation_false'=> $mae_false,
            'measurement_and_evaluation_description'=> $mae_description,
            'teaching_principles_and_methods_true'=> $tpam_true,
            'teaching_principles_and_methods_false'=> $tpam_false,
            'teaching_principles_and_methods_description'=> $tpam_description
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

require admin_view('trials/trial-add-kpss-education');

