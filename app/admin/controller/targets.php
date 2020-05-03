<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

$id = session('user_id');


$dersler = $db->from('question_targets')
    ->where('user_id', session('user_id'))
    ->orderBy('id', 'DESC')
    ->all();

$lessons = $db->from($lessons_table_name)
    ->where('user_id', session('user_id'))
    ->first();


$questionTargets = [];
foreach ($dersler as $key => $val){
    $questionTargets[$val['lesson_name']]=$val;
}

$lessons = array_splice($lessons, 2);
foreach ($lessons as $key => $val) {
    if ($val == 0) {
        unset($lessons[$key]);
        unset($questionTargets[$key]);
    }
}

$bookTargets = $db->from('book_targets')
    ->where('user_id', session('user_id'))
    ->orderBy('id', 'DESC')
    ->all();



//-------------------- question_total_solved ------------------
$_q_t_s = $db->prepare('SELECT (SUM(question_true) + SUM(question_false) + SUM(question_empty)) as total_solved,lesson_name FROM questions WHERE DATE(question_date) = CURDATE() AND user_id=:user_id GROUP BY lesson_name');
$_q_t_s->execute([
    'user_id' => session('user_id')
]);
$q_t_s = $_q_t_s->fetchAll(PDO::FETCH_ASSOC);

$question_total_solved = [];
foreach ($q_t_s as $key => $val) {
    $question_total_solved[$val['lesson_name']] = $val;
}


foreach ($question_total_solved as $key => $val) {
    if (!isset($questionTargets[$key])) {
        unset($question_total_solved[$key]);
    }
}

function percent_calculation($read_page, $total_page)
{
    $result = (int) (($read_page / $total_page) * 100);
    return $result;
}


//-------------------- books_read_total ------------------
$_books_read_total = $db->prepare('SELECT SUM(book_read_page) as reads_total FROM books_reads WHERE DATE(book_date) = CURDATE() AND user_id=:user_id');
$_books_read_total->execute([
    'user_id' => session('user_id')
]);
$reads_total = $_books_read_total->fetch(PDO::FETCH_ASSOC);

if(!isset($reads_total['reads_total'])){
    $reads_total =0;
}else{
    $reads_total= $reads_total['reads_total'];
}

$menu_active = 'targets';
require admin_view('targets');

