<?php



if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

$id = get('id');

if(!$id){
    echo 'basgitlan burdan';
}

$book=$db->from('books')
    ->where('id', $id)
    ->first();

if(!$book){
    header('location:'.admin_url('book'));
}

if (post('submit')){


    $book_name = post('book_name');
    $book_summary = post('book_summary');
    $book_author = post('book_author');


    $bookUptade= $db->update('books')
        ->where('id', $id)
        ->set([
            'book_name'=> $book_name,
            'book_summary' => $book_summary,
            'book_author' => $book_author
        ]);

    if ($bookUptade){
        header('location:'.admin_url('books'));
    }

    else {
        echo 'tüü lan sana';
    }

}
$menu_active = 'book-edit';
require admin_view('book-edit');