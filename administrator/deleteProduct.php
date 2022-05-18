<?php
    $index_product = $_GET['index_product'];

    include 'admin_connection.php';
    $sth = $db->prepare("DELETE FROM `product` WHERE product_id = '$index_product'");
    $sth->execute();

    header("location:product.php");
