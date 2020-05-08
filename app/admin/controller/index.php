<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

/*********questions_books_total*********** */
$query = $db->prepare('select sum(book_read_page) as book_read_total
	          from books_reads
              WHERE DAY(book_date) = DAY(CURDATE()) and books_reads.user_id = :user_id
');
$query->execute([
    'user_id' => session('user_id'),
]);
$book_read_total = $query->fetch(PDO::FETCH_ASSOC);
$book_read_total= $book_read_total['book_read_total']? $book_read_total['book_read_total']:0;

/*********questions_books_total*********** */

$query = $db->prepare('select (sum(question_true)+sum(question_false)+sum(question_empty)) as questions_total
		from question_targets
		left join questions on question_targets.lesson_name = questions.lesson_name 
		and question_targets.user_id = questions.user_id
WHERE DAY(question_date) = DAY(CURDATE()) and question_targets.user_id = :user_id
');
$query->execute([
    'user_id' => session('user_id'),
]);
$question_total = $query->fetch(PDO::FETCH_ASSOC);
$question_total= $question_total['questions_total']? $question_total['questions_total']:0;

//******************* question_book_target ******************************

$query = $db->prepare('select 	sum(question_targets.target)as question_target,
		book_targets.target as book_target
		from question_targets
        left join book_targets on question_targets.user_id = book_targets.user_id
        WHERE  question_targets.user_id = :user_id
');
$query->execute([
    'user_id' => session('user_id')
]);
$question_book_target = $query->fetch(PDO::FETCH_ASSOC);
$question_target = $question_book_target['question_target']?$question_book_target['question_target']:0;
$book_target = $question_book_target['book_target']?$question_book_target['book_target']:0;

function target_percent($data,$target){
    if($target == 0)
        return 0;
    return (int)(($data/$target)*100);
}


/*********book_reads_max*********** */

$query = $db->prepare('SELECT max(book_read_page) as book_reads_max,
    DATE_FORMAT(book_date, "%d %M %Y") as record_day
    from books_reads 
    where user_id=:user_id');
$query->execute([
    'user_id' => session('user_id')
]);
$book_reads_max = $query->fetch(PDO::FETCH_ASSOC);
$book_reads_max_page = isset($book_reads_max['book_reads_max'])? $book_reads_max['book_reads_max'] :0;
$book_reads_max_day = $book_reads_max['record_day'];
/*********$week_question_total*********** */

$query = $db->prepare('SELECT
	(SUM(question_true) +
	SUM(question_false) +
	SUM(question_empty))as total_question
    FROM questions 
    WHERE WEEK(question_date,1) = WEEK(CURDATE(),1) AND user_id=:user_id ');
$query->execute([
    'user_id' => session('user_id')
]);
$week_question_total = $query->fetch(PDO::FETCH_ASSOC);
$week_question_total = isset($week_question_total['total_question'])? $week_question_total['total_question'] :0;

/*********day_questions_record*********** */
$query = $db->prepare('SELECT (SUM(question_true) +
	SUM(question_false) +
	SUM(question_empty))as record_question,
	DATE_FORMAT(question_date, "%d %M %Y") as record_day
    FROM questions 
    WHERE DAY(question_date) = DAY(CURDATE()) AND user_id =:user_id 
    order by record_question desc');
$query->execute([
    'user_id' => session('user_id')
]);
$day_questions_record = $query->fetch(PDO::FETCH_ASSOC);
$day_questions_record_score = isset($day_questions_record['record_question'])?$day_questions_record['record_question']:0;
$day_questions_record_date= $day_questions_record['record_day'];



$day_questions_record = isset($week_question_total['total_question'])? $week_question_total['total_question'] :0;




/*********weekLessonsBarChart*********** */
$query = $db->prepare('SELECT lesson_name, 
	SUM(question_true) AS total_true, 
	SUM(question_false) AS total_false,
	SUM(question_empty) AS total_empty
    FROM questions 
    WHERE WEEK(question_date,1) = WEEK(CURDATE(),1) AND user_id=:user_id 
    GROUP BY lesson_name
    ORDER BY question_date');
$query->execute([
    'user_id' => session('user_id')
]);

$currentWeekQuestions = $query->fetchAll(PDO::FETCH_ASSOC);

$week_lesson_name=[];
$week_question_true=[];
$week_question_false=[];
$week_question_empty=[];
foreach($currentWeekQuestions as $key => $value){
    array_push($week_lesson_name, $_lessons[$value['lesson_name']]);
    array_push($week_question_true, $value['total_true']);
    array_push($week_question_false, $value['total_false']);
    array_push($week_question_empty, $value['total_empty']);
}



/*********weekQuestionsBarChart*********** */
$query = $db->prepare("SELECT DATE_FORMAT(question_date, \"%d %M\") as question_day,
    SUM(question_true) AS total_true, 
    SUM(question_false) AS total_false,
    SUM(question_empty) AS total_empty,
    (SUM(question_true) + SUM(question_false) + SUM(question_empty)) as total_questions
    FROM questions 
    WHERE WEEK(question_date,1) = WEEK(CURDATE(),1)  AND user_id=:user_id 
    GROUP BY question_day 
    ORDER BY question_date");
$query->execute([
    'user_id' => session('user_id')
]);
$currentWeekAllQuestions = $query->fetchAll(PDO::FETCH_ASSOC);

$week_all_question_day=[];
$week_all_question_true=[];
$week_all_question_false=[];
$week_all_question_empty=[];

foreach($currentWeekAllQuestions as $key => $value){
    array_push($week_all_question_day, $value['question_day']);
    array_push($week_all_question_true, $value['total_true']);
    array_push($week_all_question_false, $value['total_false']);
    array_push($week_all_question_empty, $value['total_empty']);
}


/*********monthQuestionsBarChart*********** */
$query = $db->prepare("SELECT 
	(SUM(question_true)+
	SUM(question_false) +
	SUM(question_empty)) AS total_questions,
	DATE_FORMAT(question_date, \"%d %M\") as question_day
    FROM questions
    WHERE (question_date <= NOW()- INTERVAL-1 MONTH) AND user_id= :user_id
    GROUP BY DAY(question_date)
    ORDER BY question_date");
$query->execute([
    'user_id' => session('user_id')
]);
$currentMonthAllQuestions = $query->fetchAll(PDO::FETCH_ASSOC);


$month_all_question_day=[];
$month_all_question_total=[];
foreach($currentMonthAllQuestions as $key => $value){
    array_push($month_all_question_day, $value['question_day']);
    array_push($month_all_question_total, $value['total_questions']);
}










$menu_active = 'index';
require admin_view('index');