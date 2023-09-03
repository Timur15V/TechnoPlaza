<?php
session_start();
require_once './includes/connect.php';


    if(isset($_GET['id'])){
        $id_user = $_GET['id'];

        $u_full_name = mysqli_query($connect, "SELECT `surname`,`name`,`patronymic` FROM `users` WHERE `users`.id = '$id_user'");
        $u_full_name = $u_full_name->fetch_all();
        $full_name = $u_full_name['0']['0'].' '.$u_full_name['0']['1'].' '.$u_full_name['0']['2'];

        $date = date('Y-m-d H:i:s');
        mysqli_query($connect, "INSERT INTO `orders` (`id`, `id_users`, `date`) VALUES (NULL, '$id_user', '$date')");
        $id_order = mysqli_query($connect, "SELECT * FROM `orders` WHERE id=(SELECT MAX(id) FROM `orders`) AND `orders`.id_users = '$id_user'");
        $id_order = $id_order->fetch_all();

        $e_cart = mysqli_query($connect, "SELECT `id`,`id_product`,`name`,`quantity`,`price` FROM `cart` WHERE `cart`.id_users = '$id_user'");
        $e_cart = $e_cart->fetch_all();

        $orders = mysqli_query($connect, "SELECT * FROM `orders` WHERE `orders`.id_users = '$id_user'");
        $orders = $orders->fetch_all();

        foreach ($id_order as $order){
            $id_order = $order['0'];
            foreach ($e_cart as $cart){
                $id_product = $cart['1'];
                $name = $cart['2'];
                $price = $cart['4'];
                $quantity = $cart['3'];
                mysqli_query($connect, "INSERT INTO `orders_has_products` (`id`, `id_orders`, `id_products`, `price`, `quantity`, `name`) VALUES (NULL, '$id_order', '$id_product', '$price', '$quantity', '$name')");
            }
        }

        $id_order = $id_order;
//        $id_product = $e_cart['1']['1'];
//        $name = $e_cart['1']['2'];
//        $price = $e_cart['1']['4'];
//        $quantity = $e_cart['1']['3'];

        $order_items = mysqli_query($connect, "SELECT * FROM `orders_has_products` WHERE `orders_has_products`.id_orders = '$id_order'");
        $order_items = $order_items->fetch_all();


//        foreach ($e_cart as $e_cart_element){
//            $id_product = $e_cart_element['1'];
//            $quantity_prod = mysqli_query($connect, "SELECT `quantity_prod` FROM `storage` WHERE `storage`.id_product = '$id_product'");
//            $quantity_prod = $quantity_prod->fetch_all();
//            $quantity = $quantity_prod['0']['0'] - $e_cart_element['3'];
//            mysqli_query($connect, "UPDATE `storage` SET `quantity_prod` = '$quantity' WHERE `storage`.`id_product` = '$id_product'");
//        }
    } else{
        $id_user = $_SESSION['user']['id'];

        $u_full_name = mysqli_query($connect, "SELECT `surname`,`name`,`patronymic` FROM `users` WHERE `users`.id = '$id_user'");
        $u_full_name = $u_full_name->fetch_all();
        $full_name = $u_full_name['0']['0'].' '.$u_full_name['0']['1'].' '.$u_full_name['0']['2'];

        $orders = mysqli_query($connect, "SELECT * FROM `orders` WHERE `orders`.id_users = '$id_user'");
        $orders = $orders->fetch_all();
        $id_order = $orders['1']['0'];

        $order_items = mysqli_query($connect, "SELECT * FROM `orders_has_products` WHERE `orders_has_products`.id_orders = '$id_order'");
        $order_items = $order_items->fetch_all();
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
<header class="header">
    <img src="./images/logo.png" alt="" class="logo">
    <div class="user">
        <span><?= $_SESSION['user']['name']?> <?= $_SESSION['user']['surname']?></span>
    </div>
    <nav class="nav-bar">
        <ul class="nav-bar_list">
            <li class="nav-bar_item"><a href="./index.php">Главная</a></li>
            <li class="nav-bar_item"><a href="./catalog.php">Каталог</a></li>
            <li class="nav-bar_item"><a href="./cart.php">Корзина</a></li>
            <li class="nav-bar_item"><a href="./orders.php">Заказы</a></li>
            <li class="nav-bar_item1"><a href="./includes/logout.php">Выход</a></li>
        </ul>
    </nav>
</header>
<div class="main">


    <div class="title">Список заказов</div>
    <?php
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
                    <li class="container-orders__element_ttl">Итого: <?=$total_price?> РУБ</li>
                </ul>
            </div>
    <?php
            $total_price = 0;
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
