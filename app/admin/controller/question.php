<?php
if (!session('user_email')) {
    header('location:' . admin_url('signin'));
}
$menu_active = 'question';


function net_hesaplama($true, $false)
{
    if ($true < 1) {
        return $false;
    }
    return round($true - ($false / 3),2);
}

if (post('lesson_name')) {
    $post_lesson_name = post('lesson_name');
    $post_lecture_id = post('lecture_id');
    $post_question_true = post('question_true');
    $post_question_false = post('question_false');
    $post_question_empty = post('question_empty');

    if (!isset($post_lecture_id)) {
        $error = "Ders konusu boş bırakılamaz!";
    } elseif (!$post_question_true && !$post_question_false && !$post_question_empty) {
        $error = "En az bir D Y B bölümü doldurmalısınız!";
    } else {

        $insert_query =  $db->insert('questions')
            ->set([
                'user_id' => session('user_id'),
                'lesson_name' => $post_lesson_name,
                'lecture_id' => $post_lecture_id,
                'question_true' => $post_question_true?$post_question_true:0,
                'question_false' => $post_question_false?$post_question_false:0,
                'question_empty' => $post_question_empty?$post_question_empty:0,
            ]);

        $insert_query ? $success = $_lessons[$post_lesson_name] . ' sorunuz eklendi.' : $error = "Eklenirken bir sorun oluştu.";
    }
}


$lessons = $db->from($lessons_table_name)
    ->where('user_id', session('user_id'))
    ->first();


$lessons = array_splice($lessons, 2);
foreach ($lessons as $key => $val) {
    if ($val == 0) {
        unset($lessons[$key]);
    }
}
//------------------- question_targets -------------------------
$q_t = $db->from('question_targets')
    ->where('user_id', session('user_id'))
    ->all();
$question_targets=[];
foreach($q_t as $key => $val){
    $question_targets[$val['lesson_name']]=$val['target'];
}

//-------------------- question_total_solved ------------------
$_q_t_s = $db->prepare('SELECT (SUM(question_true) + SUM(question_false) + SUM(question_empty)) as total_solved,lesson_name FROM questions WHERE DATE(question_date) = CURDATE() AND user_id=:user_id GROUP BY lesson_name');
$_q_t_s->execute([
    'user_id'=>session('user_id')
]);
$q_t_s = $_q_t_s->fetchAll(PDO::FETCH_ASSOC);


$question_total_solved = [];
foreach ($q_t_s as $key => $val) {
    $question_total_solved[$val['lesson_name']] = $val;
}




$_question = $db->prepare('SELECT * FROM questions WHERE DATE(question_date) = CURDATE() AND user_id=:user_id');
$_question->execute([
    'user_id' => session('user_id')
]);
$questions = $_question->fetchAll(PDO::FETCH_ASSOC);

require admin_view('question');
