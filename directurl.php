<?php

if (!isset($_SESSION['user_id'])) {
    header("location: index.php");
} else {
    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $second_name = $_SESSION['second_name'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $phone = $_SESSION['phone'];
    $address_id = $_SESSION['address_id'];
    $is_admin = $_SESSION['is_admin'];
    include 'connection.php';
}
