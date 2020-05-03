<?php
if (!session('user_email')) {
    header('location:' . admin_url('signin'));
}
$menu_active = 'question';

require PATH . '/app/module/lecture.php';

function net_hesaplama($true, $false)
{
    if ($true < 1) {
        return $false;
    }
    return round($true - ($false / 3),2);
}

$lessons = $db->from('lessons_lgs')
    ->where('user_id', session('user_id'))
    ->first();

  


$lessons = array_splice($lessons, 2);
foreach ($lessons as $key => $val) {
    if ($val == 0) {
        unset($lessons[$key]);
    }
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
                'question_true' => $post_question_true,
                'question_false' => $post_question_false,
                'question_empty' => $post_question_empty,
            ]);

        $insert_query ? $success = $lessons_lgs[$post_lesson_name] . ' sorunuz eklendi.' : $error = "Eklenirken bir sorun oluştu.";
    }
}

 $questions =$db->query('SELECT * FROM questions WHERE DATE(question_date) = CURDATE() AND user_id='.session('user_id'))->fetchAll(PDO::FETCH_ASSOC);

require admin_view('question_details');
