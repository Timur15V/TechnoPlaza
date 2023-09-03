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
   <!-- Форма авторизации -->
   <div class="wrapper">
      <div class="container_formLog">
         <form class="form_login" action="./includes/signin.php" method="post">
            <div class="title1">Авторизация</div>
               <label>Логин</label>
               <input type="text" class="input_login" name="login" placeholder="Введите логин">
               <label>Пароль</label>
               <input type="password" class="input_login" name="password" placeholder="Введите пароль">
               <button class="but_login" type="submit">Войти</button>
               <p>
                  У вас нет аккаунта? - <a class="log_href" href="./register.php">Зарегистрируйтесь</a>!
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