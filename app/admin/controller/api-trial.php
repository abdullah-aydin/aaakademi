<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}


// QUERY OF DELETE TRIAL
if(post('trialDelete') &&post('trialId') && post('tableName')) {

    $id = post('trialId');
    $trial_table_name = post('tableName');



    $trialDeleteQuery = $db->prepare('DELETE FROM :table WHERE id = ? ');
    $trialDeleteQuery->execute([
        $trial_table_name,
        $id
    ]);

    echo $trialDeleteQuery;
}