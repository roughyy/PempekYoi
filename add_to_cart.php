<?php
session_start();
include 'directurl.php';
$product_id = $_POST['product_id'];
$product_qty = $_POST['product_qty'];
$add_cart = $db->prepare("INSERT INTO cart (product_id, qty, user_id) VALUES ('$product_id', '$product_qty', '$user_id')");
$add_cart->execute();
header('Location: ' . $_SERVER['HTTP_REFERER']);
