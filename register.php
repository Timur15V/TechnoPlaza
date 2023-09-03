<?php
   session_start();

   if ($_SESSION['user']){
      header('Location: profile.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="./css/main.css">
   <title>TechnoPlaza</title>
</head>
<body>
   <!-- Форма регистрации -->
   <div class="wrapper">
      <div class="container_formLog">
         <form class="form_login" action="./includes/signup.php" method="post">
             <div class="title1">Регистрация</div>
               <label>Фамилия</label>
               <input type="text" class="input_login" name="surname" placeholder="Введите вашу фамилию">
               <label>Имя</label>
               <input type="text" class="input_login" name="name" placeholder="Введите ваше имя">
               <label>Отчество</label>
               <input type="text" class="input_login" name="patronymic" placeholder="Введите ваше отчество">
               <label>Логин</label>
               <input type="text" class="input_login" name="login" placeholder="Введите свой логин">
               <label>Почта</label>
               <input type="email" class="input_login" name="email" placeholder="Введите свой адрес электронной почты">
               <label>Создайте пароль</label>
               <input type="password" class="input_login" name="password" placeholder="Введите пароль">
               <label>Подтвердите пароль</label>
               <input type="password" class="input_login" name="password_confirm" placeholder="Подтвердите пароль">
               <button class="but_login" type="submit">Зарегистрироваться</button>
               <p>
                  У вас уже есть аккаунт? - <a class="log_href" href="./login.php">Авторизируйтесь</a>!
               </p>
               <?php 
                     if ($_SESSION['message']){
                        echo '
                           <p class="msg">'.$_SESSION['message'].'</p>
                        ';
                     }
                     unset($_SESSION['message']);
               ?>

         </form>
      </div>
   </div>
</body>
</html>