<?php
include 'connection.php';
    $c_id = $_GET['c_id'];
    echo "DELETE FROM `cart` WHERE `cart_id` =  '$c_id'";
    $sth2 = $db->prepare("DELETE FROM `cart` WHERE `cart_id` =  '$c_id'");
    $sth2->execute();

    header("location:cart.php");
?>