<?php
    session_start()
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


    <div class="title">Магазин видео-аудио техники TechnoPlaza</div>
    <p class="description">     TechnoPlaza это не только магазин, это люди преданные качественному звуку, хорошей музыке и своим клиентам. И Вам в свою очередь мы предлагаем только лучшее. Акустика и проигрыватели, усилители и ресиверы и многое-многое другое. Мы хотим чтобы ваша жизнь была наполнена яркими впечатлениями, запоминающимися моментами, интересными концертами и чтобы Вы могли найти Ваш звук, идеальный во всех отношениях!</p>
    <div class="slider swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <div class="slider-image">
                    <img src="./images/products/Focal%20Aria%20906%20Noyer.jpg" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider-image">
                    <img src="./images/products/Focal%20Sub%20Air%20Black.jpg" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider-image">
                    <img src="./images/products/Leak%20Stereo%20130%20Walnut.jpg" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider-image">
                    <img src="./images/products/Thorens%20TD%20103A%20Piano%20Black.jpg" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slider-image">
                    <img src="./images/products/Audio-Technica%20AT-LP3XBT%20Black.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <div class="swiper-pagination"></div>
    </div>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="./JS/swiper.js"></script>

</div>
<footer>
    <ul class="footer-list">
        <li class="footer-list_element"><a target="_blank" href="">technoplaza@gmail.com</a></li>
        <li class="footer-last_element">+74242424243</li>
    </ul>
</footer>


</body>
</html>