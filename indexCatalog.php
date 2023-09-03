<?php
session_start();
require_once './includes/connect.php';
require_once './includes/funcs.php';

$products = get_products();

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
    </div>
    <nav class="nav-bar">
        <ul class="nav-bar_list">
            <li class="nav-bar_item"><a href="./index.php">Главная</a></li>
            <li class="nav-bar_item"><a href="./indexCatalog.php">Каталог</a></li>
            <li class="nav-bar_item1"><a href="./login.php">Логин</a>/<a href="./register.php">Регистрация</a></li>
        </ul>
    </nav>
</header>
<div class="main">


    <div class="title">Каталог товаров</div>
    <?php
    if ($_SESSION['message']){
        echo '
                 <p class="msg">'.$_SESSION['message'].'</p>
            ';
    }
    unset($_SESSION['message']);
    ?>
    <ul class="products-container">
        <?php
        foreach($products as $product){
            ?>

            <form method="post" action="./cart.php?action=add&id=<?=$product['0']?>">
                <li class="products-element">
                    <input type="hidden" class="products-element__name" name="hidden_name" value="<?=$product['1']?>"/>
                    <span class="products-element__name"><?=$product['1']?></span>

                    <img class="products-element__img" src="./<?=$product['4']?>" />

                    <input type="hidden" class="products-element__price" name="hidden_price" value="<?=$product['2']?>"/>
                    <span class="products-element__price"><?=$product['2']?> РУБ</span>

                    <span class="products-element__name">Краткое описание: <?=$product['3']?></span>
                </li>
            </form>
            <?php
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

</body>
</html>
