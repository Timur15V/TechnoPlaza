<?php
session_start();
require_once '../includes/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <title>TechnoPlaza</title>
</head>
<body>
<header class="header">
    <img src="../images/logo.png" alt="" class="logo">
    <div class="user">
        <span><?= $_SESSION['admin']['login']?></span>
    </div>
    <nav class="nav-bar">
        <ul class="nav-bar_list">
            <li class="nav-bar_item"><a href="../admin.php">Главная</a></li>
            <li class="nav-bar_item"><a href="./adminCatalog.php">Каталог</a></li>
            <li class="nav-bar_item"><a href="../workers.php">Сотрудники</a></li>
            <li class="nav-bar_item"><a href="./adminOrders.php">Заказы</a></li>
            <li class="nav-bar_item1"><a href="../includes/logout.php">Выход</a></li>
        </ul>
    </nav>
</header>
<div class="main">


    <div class="title">Список заказов</div>
    <?php
        $id_users = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `users`.id != 13");
        $id_users = $id_users->fetch_all();

        foreach ($id_users as $id_user) {
            $id_user = $id_user['0'];
            $u_full_name = mysqli_query($connect, "SELECT `surname`,`name`,`patronymic` FROM `users` WHERE `users`.id = '$id_user'");
            $u_full_name = $u_full_name->fetch_all();
            $full_name = $u_full_name['0']['0'] . ' ' . $u_full_name['0']['1'] . ' ' . $u_full_name['0']['2'];

            $e_cart = mysqli_query($connect, "SELECT `id`,`id_product`,`name`,`quantity`,`price` FROM `cart` WHERE `cart`.id_users = '$id_user'");
            $e_cart = $e_cart->fetch_all();

            $orders = mysqli_query($connect, "SELECT * FROM `orders` WHERE `orders`.id_users = '$id_user'");
            $orders = $orders->fetch_all();

            $orders = mysqli_query($connect, "SELECT * FROM `orders` WHERE `orders`.id_users = '$id_user'");
            $orders = $orders->fetch_all();
            $id_order = $orders['0']['0'];

            $order_items = mysqli_query($connect, "SELECT * FROM `orders_has_products` WHERE `orders_has_products`.id_orders = '$id_order'");
            $order_items = $order_items->fetch_all();
                foreach ($orders as $order){
                    ?>
                    <div class="container-orders">
                        <ul class="container-orders__list">
                            <li class="container-orders__element">Номер заказа: №<?=$order['0']?></li>
                            <li class="container-orders__element">ФИО покупателя: <?= $full_name?></li>
                            <li class="container-orders__element_ttl">Детали заказа:</li>
                            <?php
                            $id_order = $order['0'];
                            $order_items = mysqli_query($connect, "SELECT * FROM `orders_has_products` WHERE `orders_has_products`.id_orders = '$id_order'");
                            $order_items = $order_items->fetch_all();
                            foreach ($order_items as $order_item){


                                echo '<li class="container-orders__element">'.$order_item['5'].' '.$order_item['3'].' РУБ '.$order_item['4'].'шт.'.'</li>';
                                $total_price += $order_item['3']*$order_item['4'];
                            }

                            ?>
                            <li class="container-orders__element">Дата: <?=$order['2']?></li>
                            <li class="container-orders__element_ttl">Итого: <?=$total_price?></li>
                        </ul>
                    </div>
                    <?php
                    $total_price = 0;
                }
        }
    ?>
</div>
<footer>
    <ul class="footer-list">
        <li class="footer-list_element"><a target="_blank" href="">technoplaza@gmail.com</a></li>
        <li class="footer-last_element">+74242424243</li>
    </ul>
</footer>

</body>
</html>
