<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

$id = get('id');

if(!$id){
    echo 'basgitlan burdan';
}


$trial=$db->from('trials')
    ->where('id', $id)
    ->first();

if(!$trial){
    header('location:'.admin_url('trial'));
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

    $query = $db->update('trials')
        ->where('id', $id)
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
        header('Location:' . admin_url('trial'));
    }

}

$menu_active = 'trial';
require admin_view('trials/trial-edit-lgs');