<?php

    session_start();
    require_once './connect.php';

    $id = $_GET['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $path = 'images/products/'.$_POST['photo'];
    $quantityAdd = $_POST['quantityAdd'];

    if (empty($title) && empty($price) && empty($description) && empty($quantityAdd)) {
        $_SESSION['message'] = 'Заполните пожалуйста все поля';
        header('Location: ../redactProd.php');
    } else {
        mysqli_query($connect, "UPDATE `products` SET `title` = '$title', `price` = '$price', `description` = '$description', `image` = '$path' WHERE `products`.`id` = '$id'");
        $id_strg = mysqli_query($connect, "SELECT * FROM `storage`,`products` WHERE `storage`.id_product = '$id'");
        $id_strg = $id_strg->fetch_all();
        $id_strg = $id_strg['0']['0'];
        print_r($id_strg);
        mysqli_query($connect, "UPDATE `storage` SET `quantity_prod` = '$quantityAdd' WHERE `storage`.`id` = '$id_strg'");
        $_SESSION['message'] = 'Информация успешно отредактирована';
        header('Location: ../admin/adminCatalog.php');
    }