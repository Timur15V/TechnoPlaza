<?php

error_reporting(-1);
session_start();
require_once './includes/connect.php';

    $id_user = $_SESSION['user']['id'];

    if(isset($_POST["add_to_cart"])){
        $id_product = $_GET['id'];
        $name = $_POST['hidden_name'];
        $price = $_POST['hidden_price'];
        $quantity = $_POST['quantity'];

        $res = mysqli_query($connect, "SELECT * FROM `storage`,`products` WHERE `storage`.`id_product`=`products`.id AND `products`.price = '$price'");
        $count = $res ->fetch_all();
        if($count['0']['2'] < $quantity){
            $_SESSION['message'] = 'Столько товара нет в наличии';
            header('Location: ./catalog.php');
        } else{
            mysqli_query($connect, "INSERT INTO `cart` (`id`, `id_users`, `id_product`, `name`, `quantity`, `price`) VALUES (NULL, '$id_user', '$id_product', '$name', '$quantity', '$price')");
            header("Location: ./catalog.php");
        }

    }

    $result = mysqli_query($connect, "SELECT * FROM `cart` WHERE `cart`.id_users = '$id_user'");
    $cartItem = $result -> fetch_all();


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
        <div class="title">Добавленные товары</div>
        <table class="bordered">
            <tr>
                <th class="bordered" width="40%">Наименование товара</th>
                <th class="bordered" width="10%">Количество</th>
                <th class="bordered" width="20%">Цена</th>
                <th class="bordered" width="15%">Общая цена</th>
                <th class="bordered" width="5%">Удаление</th>
            </tr>
            <?php
                $total = 0;
                foreach($cartItem as $product){
            ?>
                <tr>
                    <th class="bordered" width="40%"><?= $product['3']?></th>
                    <th class="bordered" width="10%"><?= $product['4']?></th>
                    <th class="bordered" width="20%"><?= $product['5']?> руб</th>
                    <th class="bordered" width="15%"><?=$product['4']*$product['5']?> руб</th>
                    <th class="bordered" width="5%"><a style="color: red" href="./includes/deleteCartItem.php?id=<?= $product['0']?>">Удалить</a></th>
                </tr>
            <?php
                    $total += $product['4']*$product['5'];
                }

            ?>
        </table>
        <table class="bordered" style="margin: 1px 0 0 0; float: right">
            <tr>
                <th class="bordered" width="33%">Общая цена корзины:</th>
                <th class="bordered" width="33%"><?=$total?> руб</th>
                <th class="bordered" width="33%"><a class="buy" href="./orders.php?id=<?= $id_user?>" >Оформить заказ</a></th>
            </tr>
        </table>

    </div>
    <footer>
        <ul class="footer-list">
            <li class="footer-list_element"><a target="_blank" href="">technoplaza@gmail.com</a></li>
            <li class="footer-last_element">+74242424243</li>
        </ul>
    </footer>
</body>
</html>
