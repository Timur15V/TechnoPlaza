<?php

function get_products(): array
{
    global $connect;
    $query = "SELECT * FROM products";
    $result = mysqli_query($connect,$query);
    return $result->fetch_all();
};
//function get_product(int $id): array|false
//{
//    global $pdo;
//    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
//    $stmt->execute([$id]);
//    return $stmt->fetch();
//}