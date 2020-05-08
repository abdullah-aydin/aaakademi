<?php

 if (post('submit')){

     $user_name = post('user_name');
     $user_email = post('user_email');
     $user_class = post('user_class');
     $user_password = post('user_password');
     $user_password_again = post('user_password_again');

     if (!$user_name){
         $error = 'Lütfen adınızı ve soyadınızı yazın.';
     } elseif (!$user_email){
         $error = 'Lütfen e-posta adresinizi yazın.';
     } elseif (!$user_class){
         $error = 'Lütfen sınıfınızı seçiniz.';
     } elseif (!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
         $error = 'Lütfen geçerli bir e-posta adresi yazın.';
     } elseif (!$user_password || !$user_password_again){
         $error = 'Lütfen şifrenizi girin.';
     } elseif ($user_password != $user_password_again){
         $error = 'Girdiğiniz şifreler birbiriyle uyuşmuyor.';
     } else {

         // üye var mı kontrol et
         $row = User::userExist($user_email);


         if ($row){
             $error = 'Bu kullanıcı adı ya da e-posta zaten kullanılıyor. Lütfen başka bir tane deneyin.';
         } else {
             // üyeyi ekle
             $result = User::Register([
                 'user_name' => $user_name,
                 'user_email' => $user_email,
                 'user_class' => $user_class,
                 'user_image_url' => admin_assets_url('/images/user.png'),
                 'user_password' => password_hash($user_password, PASSWORD_DEFAULT)
             ]);

             if ($result){
                 $success = 'Üyeliğiniz başarıyla oluşturuldu, yönlendiriliyorsunuz.';
                 User::Login([
                     'user_id' => $db->lastInsertId(),
                     'user_name' => $user_name,
                     'user_email' => $user_email,
                     'user_class' => $user_class,
                     'user_image_url' => admin_assets_url('/images/user.png'),
                 ]);
                 header('Refresh:2;url=' . admin_url('middleware'));
             } else {
                 $error = 'Bir sorun oluştu, lütfen daha sonra tekrar deneyin.';
             }

         }

     }

 }

require admin_view('signup');