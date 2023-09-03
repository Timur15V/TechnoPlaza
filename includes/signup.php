<?php

   session_start();
   require_once './connect.php';


   $surname = $_POST['surname'];
   $name = $_POST['name'];
   $patronymic = $_POST['patronymic'];
   $login = $_POST['login'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password_confirm = $_POST['password_confirm'];

   if(empty($surname) && empty($name) && empty($patronymic) && empty($login) && empty($email) && empty($password) && empty($password_confirm)){
      $_SESSION['message']='Заполните пожалуйста все формы регистрации';
      header('Location: ../register.php');
   } else {
      if($password === $password_confirm){
         
         $password = $password;

         mysqli_query($connect, "INSERT INTO `users` (`id`, `surname`, `name`, `patronymic`, `login`, `email`, `password`) VALUES (NULL, '$surname', '$name', '$patronymic', '$login', '$email', '$password')");

         $_SESSION['message']='Регистрация прошла успешно';
         header('Location: ../login.php');
      
      }
      else{
         $_SESSION['message']='Пароли не совпадают';
         header('Location: ../register.php');
      }
   }
