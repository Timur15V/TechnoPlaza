<?php
    session_start();
    require_once './funcs.php';
    require_once './connect.php';
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $path = 'images/products/'.$_POST['photo'];
    $quantityAdd = $_POST['quantityAdd'];

    if(empty($title) && empty($price) && empty($description) && empty($quantityAdd))
    {
        $_SESSION['message']='Заполните пожалуйста все поля';
        header('Location: ../addProd.php');
    } else {
        mysqli_query($connect, "INSERT INTO `products` (`id`, `title`, `price`, `description`, `image`) VALUES (NULL, '$title', '$price', '$description', '$path')");
        $result = mysqli_query($connect,"SELECT MAX(`id`) FROM `products`");
        $last = $result->fetch_all();
        $id = $last['0'];
        $id = $id['0'];
        mysqli_query($connect, "INSERT INTO `storage` (`id`, `id_product`, `quantity_prod`) VALUES (NULL, '$id', '$quantityAdd')");
        $_SESSION['message']='Успешно добавлен товар';
        header('Location: ../admin/adminCatalog.php');
    }

?>
<!--<pre>-->
<?php
//        mysqli_query($connect, "INSERT INTO `products` (`id`, `title`, `price`, `description`, `image`) VALUES (NULL, '$title', '$price', '$description', '$path')");
//        $result = mysqli_query($connect,"SELECT MAX(`id`) FROM `products`");
//        $last = $result->fetch_all();
//        $id = $last['0'];
//        $id = $id['0']+1;
//        print_r($id);
//?>
<!--</pre>-->

