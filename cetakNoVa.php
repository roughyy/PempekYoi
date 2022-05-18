<?php

    $no_invoice = $_GET['no_invoice'];
    $trx_id = $_GET['trx_id'];
    include 'connection.php';
    $sth2 = $db->prepare("SELECT * FROM `tb_va` where no_invoice = '$no_invoice'");
    $sth2->execute();
    $banyak = $sth2->rowCount();

    if($banyak >= 1){
        header("location:index.php?sukses=8");
    } else {
        $sth3 = $db->prepare("INSERT INTO `tb_va`(`no_invoice`, `id_paymu`) VALUES ('$no_invoice','$trx_id')");
        $sth3->execute();
        header("location:index.php?sukses=7");
    }
