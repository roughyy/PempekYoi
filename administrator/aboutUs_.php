<?php
include 'admin_connection.php';
$about_us = $_POST['aboutus'];

$sth = $db->prepare("UPDATE `tb_aboutus` SET `about_us`='$about_us'");
$sth->execute();

if (isset($_FILES['file'])) {
  $allowedExts = array("gif", "jpeg", "jpg", "png");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);
  if ((($_FILES["file"]["type"] == "image/gif")
      || ($_FILES["file"]["type"] == "image/jpeg")
      || ($_FILES["file"]["type"] == "image/jpg")
      || ($_FILES["file"]["type"] == "image/pjpeg")
      || ($_FILES["file"]["type"] == "image/x-png")
      || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 10000000)
    && in_array($extension, $allowedExts)
  ) {
    if ($_FILES["file"]["error"] > 0) {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {

      $fileName = $temp[0] . "." . $temp[1];
      $temp[0] = date('ymd h:i:s a', time()); //Set to random number
      $fileName;

      if (file_exists("../assets/image/" . $_FILES["file"]["name"])) {
        echo $_FILES["file"]["name"] . " already exists. ";
      } else {
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $title_for_jpg . round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/images/" . $newfilename);
        $file_location = "assets/images/" . $newfilename;
      }
    }
  } else {
    echo "Invalid file";
  }


  $sth = $db->prepare("UPDATE `tb_aboutus` SET `about_us_img`='$file_location'");
  $sth->execute();
}
header('location:aboutUs.php');
