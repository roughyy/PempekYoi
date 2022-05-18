<?php


$product_name = $_POST['product_name'];
$price = $_POST['price_each'];
$stock = $_POST['stock'];
$description = $_POST['description'];
$weight = $_POST['weight'];
$product_id = $_POST['product_id'];

echo $product_id;

include 'admin_connection.php';

$sth = $db->prepare("UPDATE `product` SET `product_name`='$product_name', `price_each`=$price,`description`='$description',`stock`=$stock,`weight`=$weight WHERE product_id = '$product_id'");
    $sth->execute();

    header("location:product.php");
