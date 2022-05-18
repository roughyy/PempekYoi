<?php


$product_name = $_POST['product_name'];
$price = $_POST['price_each'];
$stock = $_POST['stock'];
$description = $_POST['description'];
$weight = $_POST['weight'];


include 'admin_connection.php';


//picture
extract($_POST);
$error = array();
$extension = array("jpeg", "jpg", "png", "gif");
foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
    $file_name = $_FILES["files"]["name"][$key];
    $file_tmp = $_FILES["files"]["tmp_name"][$key];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    if (in_array($ext, $extension)) {
        $filename = basename($file_name, $ext);
        $newFileName = $filename . date('y-m-d') . "." . $ext;
        move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "../assets/images/" . $newFileName);
        $filepath = "assets/images/" . $newFileName;
        $sql = $db->prepare("INSERT INTO product(`product_name`, `price_each`, `description`, `stock`, `weight`, `picture`) VALUES(:product_name,:price,:description,:stock,:weight,:picture)");
        //insert tb_product
        $sql->bindParam(':product_name', $product_name);
        $sql->bindParam(':price', $price);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':stock', $stock);
        $sql->bindParam(':weight', $weight);
        $sql->bindParam(':picture', $filepath);
        $sql->execute();
    } else {
        array_push($error, "$file_name, ");
    }
}


header("location:product.php");
