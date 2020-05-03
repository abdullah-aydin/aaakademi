<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

if(post('submit')){
   $profileUpdate = $db->update('users')
   ->where('user_id',session('user_id'))
   ->set([
       'user_name'=>post('user_name'),
       'user_birthday'=>post('user_birthday')?post('user_birthday'):null,
       'user_ability'=>post('user_ability'),
       'user_school'=>post('user_school'),
   ]);

   if ($profileUpdate) {
       $_SESSION['user_name'] = post('user_name');
       $success = 'Profilinizi başarı ile güncellediniz.';

   }
    
   if(post('lessons')){
        foreach(post('lessons') as $key => $val){
            $lesson_zero[$key]=$val;
        }

        $db->update($lessons_table_name)
        ->where('user_id',session('user_id'))
        ->set($lesson_zero);
   }else{
        $db->update($lessons_table_name)
        ->where('user_id',session('user_id'))
        ->set($lesson_zero);
    }
    
}


$profile=$db->from('users')
            ->where('users.user_id',session('user_id'))
            ->first();
//TODO:: TABLO İSMİNİ DİNAMİK HALE GETİR
$lessons=$db->from($lessons_table_name)
            ->where('user_id',session('user_id'))
            ->first();

$lessons=array_splice($lessons,2);

function isset_value($param){
    return isset($param)? $param :null;
}

$menu_active = 'profile';
require admin_view('profile');