<?php
    require_once './connect.php';

    $id = $_GET['id'];

    mysqli_query($connect, "DELETE FROM workers WHERE `workers`.`id` = '$id'");
    header('Location: ../workers.php');