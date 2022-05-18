<?php
$no_invoice = $_GET['no_invoice'];
$trx_id = $_GET['trx_id'];

include 'connection.php';
$sth1 = $db->prepare("SELECT * FROM `tb_va` where no_invoice = '$no_invoice'");
$sth1->execute();
$banyak = $sth1->rowCount();

if ($banyak >= 1) {
    $sth3 = $db->prepare("UPDATE `invoice` SET status='2' WHERE invoice_id = '$no_invoice'");
    $sth3->execute();
} else {
    $sth3 = $db->prepare("INSERT INTO `tb_va`(`no_invoice`, `id_paymu`) VALUES ('$no_invoice', '$trx_id'");
    $sth3->execute();

    $sth3 = $db->prepare("UPDATE `invoice` SET status='2' WHERE index_invoice = '$no_invoice'");
    $sth3->execute();
}
