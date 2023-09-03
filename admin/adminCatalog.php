<?php
    session_start();
    require_once '../includes/connect.php';
    require_once '../includes/funcs.php';

    $products = get_products();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
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


    <div class="title">Каталог товаров</div>
    <a href="../addProd.php" class="products-element__btn fullWidth">ДОБАВИТЬ ТОВАР</a>
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
        foreach($products as $product)
            echo
                '
                        
                            <li class="products-element">
                                <span class="products-element__name">'.$product['1'].'</span>
                                <img class="products-element__img" src="../'.$product['4'].'" />
                                <span class="products-element__price">'.$product['2'].' РУБ</span>
                                <span class="products-element__name">Краткое описание: '.$product['3'].'</span>
                                <label class="des">Количество:</label>
                                <input type="text" class="input_login" name="quantity" placeholder="Введите количество" value="1">
                                <a class="delete_btn" href="../includes/delete.php?id='.$product['0'].'">Удалить товар</a>
                                <a class="redact_btn" href="../redactProd.php?id=' . $product['0'] . '">Редактировать</a>
                            </li>
                    '
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
