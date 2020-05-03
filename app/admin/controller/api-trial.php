<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}


// QUERY OF DELETE TRIAL
if(post('trialDelete') &&post('trialId')) {

    $id = post('trialId');


    $trialDeleteQuery = $db->prepare('DELETE FROM trials WHERE id = ? ');
    $trialDeleteQuery->execute([
        $id
    ]);

    echo $trialDeleteQuery;
}