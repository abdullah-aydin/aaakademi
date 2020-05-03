<?php


class User {

    public static function Login($data)
    {
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['user_name'] = $data['user_name'];
        $_SESSION['user_email'] = $data['user_email'];
        $_SESSION['user_class'] = $data['user_class'];
        $_SESSION['user_image_url'] = $data['user_image_url'];
    }

    public static function userExist($user_email)
    {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE user_email = :user_email');
        $query->execute([
            'user_email' => $user_email
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function Register($data)
    {
        global $db;
        $query = $db->prepare('INSERT INTO users SET user_name = :user_name, user_email = :user_email, user_password = :user_password, user_class = :user_class, user_image_url = :user_image_url');
        return $query->execute($data);
    }


}