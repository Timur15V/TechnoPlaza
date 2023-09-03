<?php

   session_start();
   require_once './connect.php';

   $login = $_POST['login'];
   $password = $_POST['password'];

   $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        if (mysqli_num_rows($check_user) > 0) {
            $user = mysqli_fetch_assoc($check_user);
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "email" => $user['email'],
                "name" => $user['name'],
                "surname" => $user['surname']
            ];
            if($_SESSION['user']['login']=='admin'){
                $_SESSION['admin'] = [
                    "login" => $user['login']
                ];
                header('Location: ../admin.php');
            }else{
                header('Location: ../profile.php');
            }

        }
         else {
            $_SESSION['message'] = 'Введен неверно логин или пароль';
            header('Location: ../login.php');
        }

?>
