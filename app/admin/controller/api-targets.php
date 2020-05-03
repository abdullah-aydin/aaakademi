<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}


// QUERY OF ACTIVE LESSONS
if (post('activeLessons')){

    $activeLessons = $db->from($lessons_table_name)
        ->where('user_id', session('user_id'))
        ->first();

    $question_target_lessons = $db->from('question_targets')
        ->where('user_id', session('user_id'))
        ->select('lesson_name')
        ->all();


    $activeLessons = array_splice($activeLessons, 2);

    $abc['lesson_name'] = [];
    foreach ($question_target_lessons as $k => $v){
        array_push($abc['lesson_name'], $v['lesson_name']);
    }

    foreach ($activeLessons as $key => $val) {
        if ($val == 0) {
            unset($_lessons[$key]);
        }
    }
    foreach ($_lessons as $k => $val){
        foreach ($abc['lesson_name'] as $k_lessons => $v_lessons){
            if ($k == $v_lessons){
                unset($_lessons[$k]);
            }
        }

    }

    echo json_encode($_lessons);

}

// QUERY OF ADD QUESTION TARGET
if (post('lessonName') && post('questionTarget')){

    $lesson_name = post('lessonName');
    $question_target = post('questionTarget');


    $addQuestionTarget = $db->insert('question_targets')
        ->set([
            'user_id' => session('user_id'),
            'lesson_name'=> $lesson_name,
            'target'=> $question_target
        ]);

    $id = (int)($db->lastId());

    $addQuestionTarget = $db->from('question_targets')
        ->where('id', $id)
        ->first();


    echo json_encode($addQuestionTarget);

}

// QUERY OF DELETE QUESTION TARGET
if(post('deleteQuestionTarget') &&post('questionTargetId')) {

    $id = post('questionTargetId');


    $deleteQuestionTarget = $db->prepare('DELETE FROM question_targets WHERE id = ? ');
    $deleteQuestionTarget->execute([
        $id
    ]);

    echo $deleteQuestionTarget;
}


// QUERY OF ADD BOOK TARGET
if (post('bookTarget')){

    $book_target = post('bookTarget');


    $db->insert('book_targets')
        ->set([
            'user_id' => session('user_id'),
            'target'=> $book_target
        ]);

    $id = (int)($db->lastId());

    $addBookTarget = $db->from('book_targets')
        ->where('id', $id)
        ->first();


    echo json_encode($addBookTarget);

}

// QUERY OF DELETE BOOK TARGET
if(post('deleteBookTarget') &&post('questionBookId')) {

    $id = post('questionBookId');


    $deleteBookTarget = $db->prepare('DELETE FROM book_targets WHERE id = ? ');
    $deleteBookTarget->execute([
        $id
    ]);

    echo $deleteBookTarget;
}