<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}
$id = session('user_id');

$query = $db->prepare('SELECT books.id as book_id, books.book_name, SUM(books_reads.book_read_page) as book_total_reads, books.book_total_pages, books.book_status, books.book_summary , books.book_author ,  books.book_init_date, books.book_end_date FROM books LEFT JOIN books_reads ON books.id = books_reads.book_id WHERE books.user_id = ? GROUP BY books.id' );
$query->execute([
    $id
]);
$allBooks= $query->fetchAll(PDO::FETCH_ASSOC);


function percent_calculation($read_page,$total_page){
    $result = (int)(($read_page/$total_page)*100);
    return $result;
}

$menu_active = 'books';
require admin_view('books');