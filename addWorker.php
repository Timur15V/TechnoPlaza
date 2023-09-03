<?php
    session_start();

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
        <div class="title1">Добавить сотрудника</div>
        <form class="form_login" action="./includes/addwork.php" method="post">
            <label>ФИО</label>
            <input type="text" class="input_login" name="full_name" placeholder="Введите ФИО">

            <label>Должность</label>
            <select name="position" style="margin: 10px 0">
                <option value="1">продавец</option>
                <option value="2">администратор</option>
            </select>

            <label>Адрес проживания</label>
            <input type="text" class="input_login" name="address" placeholder="Введите адрес проживания">
            <label>Номер телефона</label>
            <input type="tel" class="input_login" name="phone" placeholder="Введите номер телефона">
            <label>Фото сотрудника</label>
            <input type="file" class="addFile" name="img">
            <label>Серия номер паспорта</label>
            <input type="text" class="input_login" name="passport" placeholder="Введите серию номер паспорта">

            <label>Пол</label>
            <select name="gender" style="margin: 10px 0">
                <option value="мужской">мужской</option>
                <option value="женский">женский</option>
            </select>

            <label>Дата рожения</label>
            <input type="text" class="input_login" name="dateBirth" placeholder="2023-03-16">
            <label>Место рождения</label>
            <input type="text" class="input_login" name="placeBirth" placeholder="Введите место рождения">
            <label>Образование</label>
            <input type="text" class="input_login" name="education" placeholder="Образование сотрудника">
            <?php
            if ($_SESSION['message']){
                echo '
                   <p class="msg">'.$_SESSION['message'].'</p>
                ';
            }
            unset($_SESSION['message']);
            ?>
            <input type="submit" name="add_worker" class="but_login" value="Занести сотрудника" />
            <a href="./workers.php" class="back">Отмена</a>


        </form>
    </div>
</div>
</body>
</html>
