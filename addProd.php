<?php
   session_start();
   require_once './includes/connect.php';

//   if ($_SESSION['user']){
//      header('Location: profile.php');
//   }

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
         <form class="form_login" action="./includes/addtov.php" method="post">
             <div class="title1">Добавить товар</div>
               <label>Название</label>
               <input type="text" class="input_login" name="title" placeholder="Введите название товара">
               <label>Цена</label>
               <input type="text" class="input_login" name="price" placeholder="Введите цену товара">
               <label>Описание</label>
               <input type="text" class="input_login" name="description" placeholder="Введите описание товара">
               <label>Фото товара</label>
               <input type="file" class="addFile" name="photo">
                <label>Количество товара на складе</label>
                <input type="text" class="input_login" name="quantityAdd" placeholder="Введите количество товара">
               <button class="but_login" type="submit">Занести товар</button>
                 <?php
                 if ($_SESSION['message']){
                     echo '
                               <p class="msg">'.$_SESSION['message'].'</p>
                            ';
                 }
                 unset($_SESSION['message']);
                 ?>
               <a href="./admin/adminCatalog.php" class="back">Отмена</a>


         </form>
      </div>
   </div>
</body>
</html>