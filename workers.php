<?php
    session_start();
    require_once './includes/connect.php';
    require_once './includes/funcs.php';

    $products = get_products();

    $res = mysqli_query($connect, "SELECT * FROM `workers`");
    $workers = $res ->fetch_all();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <title>TechnoPlaza</title>
</head>
<body>
<header class="header">
    <img src="./images/logo.png" alt="" class="logo">
    <div class="user">
        <span><?= $_SESSION['admin']['login']?></span>
    </div>
    <nav class="nav-bar">
        <ul class="nav-bar_list">
            <li class="nav-bar_item"><a href="./admin.php">Главная</a></li>
            <li class="nav-bar_item"><a href="./admin/adminCatalog.php">Каталог</a></li>
            <li class="nav-bar_item"><a href="./workers.php">Сотрудники</a></li>
            <li class="nav-bar_item"><a href="./admin/adminOrders.php">Заказы</a></li>
            <li class="nav-bar_item1"><a href="./includes/logout.php">Выход</a></li>
        </ul>
    </nav>
</header>
<div class="main">

    <?php
    if ($_SESSION['message']){
        echo '
                <p class="msg">'.$_SESSION['message'].'</p>
            ';
    }
    unset($_SESSION['message']);
    ?>
    <div class="title">Список сотрудников</div>
    <a href="./addWorker.php" class="products-element__btn fullWidth">ДОБАВИТЬ СОТРУДНИКА</a>
    <ul class="products-container">
        <?php
        foreach($workers as $worker) {
            $id_position = $worker['1'];
            $position = mysqli_query($connect, "SELECT * FROM `Position` WHERE `Position`.id = '$id_position'");
            $position = $position->fetch_all();
            foreach ($position as $pos) {
                echo
                    '
                        
                  <li class="products-element">
                       <span class="products-element__name" style="margin: 10px 0">' . $worker['2'] . '</span>
                       <span class="products-element__name" style="margin: 10px 0">Должность: ' . $pos['1'] . '</span>
                       <img class="products-element__img" src="./' . $worker['5'] . '" />
                       <span class="products-element__name" style="margin: 10px 0">Оклад: ' . $pos['3'] . '</span>
                       <span class="products-element__name" style="margin: 10px 0">Процент от продаж: ' . $pos['4']*100 . '%</span>
                       <span class="products-element__price" style="margin: 10px 0">Адрес: ' . $worker['3'] . ' РУБ</span>
                       <span class="products-element__name" style="margin: 10px 0">Номер телефона: ' . $worker['4'] . '</span>
                       <span class="products-element__name" style="margin: 10px 0">Серия номер паспорта: ' . $worker['6'] . '</span>
                       <span class="products-element__name" style="margin: 10px 0">Пол: ' . $worker['7'] . '</span>
                       <span class="products-element__name" style="margin: 10px 0">Дата рождения: ' . $worker['8'] . '</span>
                       <span class="products-element__name" style="margin: 10px 0">Место рождения: ' . $worker['9'] . '</span>
                       <span class="products-element__name" style="margin: 10px 0">Образование: ' . $worker['10'] . '</span>
                       
                       <a class="delete_btn" href="../includes/deleteW.php?id=' . $worker['0'] . '">Удалить сотрудника</a>
                       <a class="redact_btn" href="../includes/redactWorkers.php?id=' . $worker['0'] . '">Редактировать</a>
                  </li>
                ';
            }
        }
        ?>
    </ul>

</div>
<footer>
    <ul class="footer-list">
        <li class="footer-list_element"><a target="_blank" href="">technoplaza@gmail.com</a></li>
        <li class="footer-last_element">+74242424243</li>
    </ul>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="./JS/main.js"></script>

</body>
</html>
