<?php

    require_once './connect.php';

    $id = $_GET['id'];

    mysqli_query($connect, "DELETE FROM cart WHERE `cart`.`id` = '$id'");
    header('Location: ../cart.php');