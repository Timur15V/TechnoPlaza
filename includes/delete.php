<?php

    require_once './connect.php';

    $id = $_GET['id'];

    mysqli_query($connect, "DELETE FROM storage WHERE `storage`.`id_product` = '$id'");
    mysqli_query($connect, "DELETE FROM products WHERE `products`.`id` = '$id'");
    header('Location: ../admin/adminCatalog.php');