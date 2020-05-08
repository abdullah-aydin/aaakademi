<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

// QUERY OF ADD BOOK
if (post('bookName') && post('bookPages')) {

    $book_name = post('bookName');
    $book_pages = post('bookPages');

    $query = $db->insert('books')
        ->set(array(
            'user_id' => session('user_id'),
            'book_name' => $book_name,
            'book_total_pages' => $book_pages
        ));

    $id = (int)($db->lastId());

    $bookSelectQuery = $db->prepare('SELECT books.id, books.book_name, SUM(books_reads.book_read_page) as book_total_reads, books.book_total_pages, books.book_status, books.book_summary , books.book_author ,  books.book_init_date, books.book_end_date FROM books LEFT JOIN books_reads ON books.id = books_reads.book_id WHERE books.id = ?');
    $bookSelectQuery->execute([
        $id
    ]);
    $bookDetails = $bookSelectQuery->fetch(PDO::FETCH_ASSOC);

    echo json_encode($bookDetails);

}

// QUERY OF ACTIVE BOOKS
if (post('activeBooks')){

    $activeBooks = $db->from('books')
        ->where('books.user_id', session('user_id'))
        ->where('books.book_status', 0)
        ->join('books_reads', 'books.id = books_reads.book_id', 'left')
        ->select('books.id, books.book_name, books.book_total_pages, SUM(books_reads.book_read_page) as books_total_reads')
        ->groupBy('books.id')
        ->all();

    echo json_encode($activeBooks);

}

// QUERY OF ADD PAGES
if (post('bookId') && post('bookReadPages')){

    $book_id = post('bookId');
    $book_read_pages = post('bookReadPages');

    $bookAddPages= $db->insert('books_reads')
        ->set([
            'user_id' => session('user_id'),
            'book_id'=> $book_id,
            'book_read_page'=>$book_read_pages
        ]);
    $id = (int)($db->lastId());

    $bookSelectQuery = $db->prepare('SELECT books.id, books.book_name, SUM(books_reads.book_read_page) as book_total_reads, books.book_total_pages, books.book_status, books.book_summary , books.book_author ,  books.book_init_date, books.book_end_date FROM books LEFT JOIN books_reads ON books.id = books_reads.book_id WHERE books.id = ?');
    $bookSelectQuery->execute([
        $book_id
    ]);
    $bookDetails = $bookSelectQuery->fetch(PDO::FETCH_ASSOC);

    echo json_encode($bookDetails);

}

// QUERY OF BOOK COMPLETED
if (post('bookCompleted') && post('bookId')){

    $book_id = post('bookId');


    $bookCompleted= $db->update('books')
        ->where('id', $book_id)
        ->set([
            'book_status'=> "1",
            'book_end_date' => date('Y-m-d h:i:s')
        ]);


    if ($bookCompleted){
        echo 'gardaş başarılı';
    }
    else{
        echo 'gardaş değil';
    }

}

// QUERY OF DELETE BOOK
if(post('bookDelete') &&post('bookId')){

    $id = post('bookId');

    $booksReads = $db->from('books_reads')
        ->where('book_id', $id)
        ->first();


        if($booksReads){
            $bookDeleteQuery = $db->prepare('DELETE books, books_reads
                            FROM books
                            INNER JOIN books_reads ON books.id = books_reads.book_id
                            WHERE books.id = books_reads.book_id and books.id = :id ');
            $bookDeleteQuery->execute([
                'id'=>$id
            ]);
        } else {
            $query = $db->delete('books')
                ->where('id', $id)
                ->done();

        }


    if ( $bookDeleteQuery ){
        echo 'user deleted';
    } else{
        echo 'gardaş hata';
    }

}

