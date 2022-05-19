<?php

include 'connection.php';
session_start();
include 'directurl.php';

$total_ongkir = $_POST['total_ongkir'];
$gt = $_POST['gt'];
$total_belanja = $_POST['total'];
$cart_id = $_POST['cart_id'];

$add_cart = $db->prepare("INSERT INTO invoice (cart_id, total_ongkir, total_belanja, grand_total,user_id) VALUES ('$cart_id', '$total_ongkir', '$total_belanja', '$gt','$user_id')");
$add_cart->execute();

$invoice_id = "";

$select_invoice = $db->prepare("SELECT MAX(invoice_id) as invoice from invoice where user_id = $user_id ORDER BY invoice DESC");
$select_invoice->execute();
while ($row = $select_invoice->fetch(PDO::FETCH_ASSOC)) {
    $invoice_id = $row['invoice'];
}

$update_cart = $db->prepare("UPDATE `cart` SET `status`='1',`invoice_id`='$invoice_id' WHERE cart_id IN ($cart_id)");
$update_cart->execute();



//header('Location: ' . $_SERVER['HTTP_REFERER']);


$va           = ''; //get on iPaymu dashboard
$secret       = ''; //get on iPaymu dashboard

//$url          = 'https://my.ipaymu.com/api/v2/payment'; //url
$url          = 'https://sandbox.ipaymu.com/api/v2/payment'; //url

$method       = 'POST'; //method

//Request Body//
$body['product']    = array('Pempek Yoi');
$body['qty']        = array('1');
$body['price']      = array($gt);
$body['returnUrl']  = 'https://mywebsite.com/cetakNoVa.php?no_invoice=' . $invoice_id;
$body['cancelUrl']  = 'https://mywebsite.com/index.php';
$body['notifyUrl']  = 'https://mywebsite.com/konfirmasiOtomatis.php?no_invoice=' . $invoice_id;
//End Request Body//

//Generate Signature
// *Don't change this
$jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
$requestBody  = strtolower(hash('sha256', $jsonBody));
$stringToSign = strtoupper($method) . ':' . $va . ':' . $requestBody . ':' . $secret;
$signature    = hash_hmac('sha256', $stringToSign, $secret);
$timestamp    = Date('YmdHis');
//End Generate Signature


$ch = curl_init($url);

$headers = array(
    'Accept: application/json',
    'Content-Type: application/json',
    'va: ' . $va,
    'signature: ' . $signature,
    'timestamp: ' . $timestamp
);

curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

curl_setopt($ch, CURLOPT_POST, count($body));
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonBody);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$err = curl_error($ch);
$ret = curl_exec($ch);
curl_close($ch);
echo $ret;
if ($err) {
    echo $err;
} else {
    $ret = json_decode($ret);
    if ($ret->Status == 200) {
        $sessionId  = $ret->Data->SessionID;
        $url        =  $ret->Data->Url;
        header('Location:' . $url);
    } else {
        echo $ret;
    }
}
