<?php

    session_start();
    require_once './connect.php';
    $id = $_GET['id'];

    $worker = mysqli_query($connect, "SELECT * FROM `workers` WHERE `workers`.id = '$id'");
    $worker = $worker ->fetch_all();
    $worker = $worker['0'];

    $id_position = $worker['1'];

    $pos = mysqli_query($connect, "SELECT * FROM `Position` WHERE `Position`.id = '$id_position'");
    $pos = $pos ->fetch_all();
    $pos = $pos['0'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <title>TechnoPlaza</title>
</head>
<body>
<!-- Форма регистрации -->
<div class="wrapper">
    <div class="container_formLog">
        <div class="title1">Редактировать информацию о сотруднике</div>
        <form class="form_login" action="./redactW.php?action=add&id=<?=$id?>" method="post">
            <label>ФИО</label>
            <input type="text" class="input_login" name="full_name" placeholder="Введите ФИО" value="<?=$worker['2']?>">

            <label>Должность</label>
            <select name="position" style="margin: 10px 0" value="<?=$pos['0']?>">
                <option value="1">продавец</option>
                <option value="2">администратор</option>
            </select>

            <label>Адрес проживания</label>
            <input type="text" class="input_login" name="address" placeholder="Введите адрес проживания" value="<?=$worker['3']?>">
            <label>Номер телефона</label>
            <input type="tel" class="input_login" name="phone" placeholder="Введите номер телефона" value="<?=$worker['4']?>">
            <label>Фото сотрудника</label>
            <input type="file" class="addFile" name="img">
            <label>Серия номер паспорта</label>
            <input type="text" class="input_login" name="passport" placeholder="Введите серию номер паспорта" value="<?=$worker['6']?>">

            <label>Пол</label>
            <select name="gender" style="margin: 10px 0" value="<?=$worker['7']?>">
                <option value="мужской">мужской</option>
                <option value="женский">женский</option>
            </select>

            <label>Дата рожения</label>
            <input type="text" class="input_login" name="dateBirth" placeholder="2023-03-16" value="<?=$worker['8']?>">
            <label>Место рождения</label>
            <input type="text" class="input_login" name="placeBirth" placeholder="Введите место рождения" value="<?=$worker['9']?>">
            <label>Образование</label>
            <input type="text" class="input_login" name="education" placeholder="Образование сотрудника" value="<?=$worker['10']?>">
            <?php
            if ($_SESSION['message']){
                echo '
                   <p class="msg">'.$_SESSION['message'].'</p>
                ';
            }
            unset($_SESSION['message']);
            ?>
            <input type="submit" name="add_worker" class="but_login" value="Редактировать"/>
            <a href="../workers.php" class="back">Отмена</a>


        </form>
    </div>
</div>
</body>
</html>
