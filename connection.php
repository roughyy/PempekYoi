<?php
try {
    $username = "root";
    $password = "";
    $db = new PDO("mysql:host=localhost;dbname=pempek_yoi", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
