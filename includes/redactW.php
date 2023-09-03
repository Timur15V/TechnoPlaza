<?php
    session_start();
    require_once './connect.php';

    $id = $_GET['id'];
    $full_name = $_POST['full_name'];
    $position = $_POST['position'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $img = 'images/workers/'.$_POST['img'];
    $passport = $_POST['passport'];
    $gender = $_POST['gender'];
    $dateBirth = $_POST['dateBirth'];
    $placeBirth = $_POST['placeBirth'];
    $education = $_POST['education'];

    if(($full_name == '') && ($address == '') && ($phone == '') && ($passport == '') && ($dateBirth == '') && ($placeBirth == '') && ($education == ''))
    {
        $_SESSION['message']='Заполните пожалуйста все поля';
        header('Location: ./redactWorkers.php');
    } else {
        print_r($address);
        mysqli_query($connect, "UPDATE `workers` SET `id_position` = '$position', `full_name` = '$full_name', `address` = '$address', `phone_number` = '$phone', `image` = '$img', `passport` = '$passport', `gender` = '$gender', `dateBirth` = '$dateBirth', `placeBirth` = '$placeBirth', `education` = '$education' WHERE `workers`.`id` = '$id'");
        $_SESSION['message']='Информация успешно отредактирована';
        header('Location: ../workers.php');
    }
