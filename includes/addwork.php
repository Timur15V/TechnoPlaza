<?php
    session_start();
    require_once './connect.php';

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
        header('Location: ../addWorker.php');
    } else {
        mysqli_query($connect, "INSERT INTO `workers` (`id`, `id_position`, `full_name`, `address`, `phone_number`, `image`, `passport`, `gender`, `dateBirth`, `placeBirth`, `education`) VALUES (NULL, '$position', '$full_name', '$address', '$phone', '$img', '$passport', '$gender', '$dateBirth', '$placeBirth', '$education')");
        $_SESSION['message']='Сотрудник успешно добавлен';
        header('Location: ../workers.php');
    }



