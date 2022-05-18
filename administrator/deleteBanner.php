<?php
    $index_banner = $_GET['index_banner'];
    include 'admin_connection.php';
    $sth = $db->prepare("DELETE FROM `tb_banner` WHERE index_banner = '$index_banner'");
    $sth->execute();
    header('location:banner.php');

?>