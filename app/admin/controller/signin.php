<?php

 if (post('submit')){
     $user_email = post('user_email');
     $user_password = post('user_password');

     if (!$user_email){
         $error = 'Lütfen emailinizi yazın.';
     } elseif (!$user_password){
         $error = 'Lütfen şifrenizi girin.';
     } else {

         // üye var mı kontrol et
         $row = User::userExist($user_email);

         if ($row){

             // parola kontrolü yap
             $password_verify = password_verify($user_password, $row['user_password']);

             if ($password_verify){

                 $success = 'Başarıyla giriş yaptınız, yönlendiriliyorsunuz.';
                 User::Login($row);

                 header('Refresh:2;url=' . admin_url());

             } else {
                 $error = 'Şifreniz hatalı, lütfen kontrol edin!';
             }

         } else {
             $error = 'Böyle bir kullanıcı sistemde kayıtlı gözükmüyor!';
         }

     }

 }
 
require admin_view('signin');