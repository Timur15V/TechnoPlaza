<?php
    session_start();
    require_once './includes/connect.php';
    require_once './includes/funcs.php';

    $products = get_products();

    $id = $_GET['id'];

    $res = mysqli_query($connect, "SELECT * FROM `products` WHERE `products`.id = '$id'");
    $products = $res ->fetch_all();
    $product = $products['0'];

    $res1 = mysqli_query($connect, "SELECT * FROM `storage`,`products` WHERE `storage`.id_product = '$id'");
    $quantity = $res1 ->fetch_all();
    $quantity = $quantity['0'];

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
        <form class="form_login" action="./includes/redactP.php?action=add&id=<?=$id?>" method="post">
            <div class="title1">Редактировать информацию о товаре</div>
            <label>Название</label>
            <input type="text" class="input_login" name="title" placeholder="Введите название товара" value="<?=$product['1']?>">
            <label>Цена</label>
            <input type="text" class="input_login" name="price" placeholder="Введите цену товара" value="<?=$product['2']?>">
            <label>Описание</label>
            <input type="text" class="input_login" name="description" placeholder="Введите описание товара" value="<?=$product['3']?>">
            <label>Фото товара</label>
            <input type="file" class="addFile" name="photo">
            <label>Количество товара на складе</label>
            <input type="text" class="input_login" name="quantityAdd" placeholder="Введите количество товара" value="<?=$quantity['2']?>">
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
