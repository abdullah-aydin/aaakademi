<?php
if(!session('user_email')){
    header('location:'.admin_url('signin'));
}

$lessons =$_lessons;

if($_POST){
   $lssn=[];
   foreach($_POST as $key => $val){
       $lssn[$key]=post($key);
   }
  $lssn['user_id']=session('user_id');



  $query= $db->insert($lessons_table_name)
  ->set($lssn);

    if($query){
         header('location:'.admin_url());
    }



}




require admin_view('middleware');