<!DOCTYPE html>
<html class="no-js" lang="en">

</html>

<?php
include 'head.php';

$sql_provinsi = $db->prepare('SELECT * FROM tb_provinsi');
$sql_provinsi->execute();
$list_provinsi = $sql_provinsi->fetchAll();
?>
<!-- pop up notification -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<body class="font-ubuntu text-body text-tiny">
    <div class="overflow-x-hidden">

        <!-- header top start -->
        <!-- header top end -->

        <!-- Header start -->

        <?php include 'header.php' ?>

        <!-- offcanvas-overlay start -->
        <div class="offcanvas-overlay hidden fixed inset-0 bg-black opacity-50 z-50"></div>
        <!-- offcanvas-overlay end -->
        <!-- offcanvas-mobile-menu start -->
        <?php include 'mobile.php' ?>
        <!-- offcanvas-mobile-menu end -->
        <!-- Header end -->

        <!-- Hero section start -->

        <!-- Hero section end -->


        <!-- About Us Sectin Start -->
        <div class="py-[80px] lg:py-[120px]">
            <div class="container">
                <form action="register.php" method="POST">
                    <div class="grid grid-cols-12 gap-x-[30px] mb-[-30px]">
                        <div class="col-span-12 lg:col-span-6 mb-[30px]">
                            <h2 class="font-recoleta text-primary text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl mb-[15px]">
                                Register to Pempek Yoi<span class="text-secondary">.</span></h2>


                            <div class="grid grid-cols-12 gap-x-[20px] gap-y-[35px]">

                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="email" placeholder="Email" name="email" required>
                                </div>
                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text" placeholder="first Name" name="first_name" required>
                                </div>
                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text" placeholder="Second Name" name="second_name" required>
                                </div>
                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text" placeholder="Phone Number" name="phone_number" required>
                                </div>
                                <div class="col-span-12">
                                    <select class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " id="provinsi_list" name="provinsi" required>
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($list_provinsi as $row) : ?>
                                        <?php echo '<option value="' . $row['index_provinsi'] . '">' . $row['nama_provinsi'] . '</option>';
                                        endforeach ?>
                                    </select>
                                </div>
                                <div class="col-span-12">
                                    <select class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " id="kota_list" name="kota" required>
                                        <option value="">Pilih Kota</option>
                                    </select>
                                </div>
                                <div class="col-span-12">
                                    <select class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " id="kecamatan_list" name="kecamatan" required>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>
                                <div class="col-span-12">
                                    <select class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " id="kelurahan_list" name="kelurahan" required>
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                </div>
                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " placeholder="Kode Pos" name="kode_pos" required>
                                </div>



                                <!-- Ajax buat dependent dropdown -->
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                                <script src="ajax-script.js" type="text/javascript"></script>
                                <script>
                                    $("#provinsi_list").on("change", function() {
                                        var provinsiID = $(this).val();
                                        $.ajax({
                                            url: "dependent_dropdown.php",
                                            type: "POST",
                                            cache: false,
                                            data: {
                                                provinsiID: provinsiID
                                            },
                                            success: function(data) {
                                                $("#kota_list").html(data);
                                            }
                                        });
                                    });
                                    $("#kota_list").on("change", function() {
                                        var kotaID = $(this).val();
                                        $.ajax({
                                            url: "dependent_dropdown.php",
                                            type: "POST",
                                            cache: false,
                                            data: {
                                                kotaID: kotaID
                                            },
                                            success: function(data) {
                                                $("#kecamatan_list").html(data);
                                            }
                                        });
                                    });
                                    $("#kecamatan_list").on("change", function() {
                                        var kecamatanID = $(this).val();
                                        $.ajax({
                                            url: "dependent_dropdown.php",
                                            type: "POST",
                                            cache: false,
                                            data: {
                                                kecamatanID: kecamatanID
                                            },
                                            success: function(data) {
                                                $("#kelurahan_list").html(data);
                                            }
                                        });
                                    });
                                </script>


                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="text" placeholder="Detail Alamat" name="detail_alamat" required>
                                </div>
                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="password" placeholder="Password" name="password" required>
                                </div>
                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="password" placeholder="re-enter Password" name="repassword" required>
                                </div>
                                <br>
                            </div>

                            <div class="col-span-12">
                                <div class="flex flex-wrap items-center">
                                    <button type="submit" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[40px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all" id="submit_button" name="create">Register</button>
                                </div>
                                <div class="flex flex-wrap items-center">
                                    <a>Sudah punya akun?<a class="click_disini" href="login.php" style="color:red ;">Click Disini</a></a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>

        </div>
    </div>
    <!-- About Us Sectin End -->




    <!-- Footer Start -->
    <?php include 'footer.php' ?>
    <!-- Footer End -->
    <?php include 'upbut.php' ?>
    </div>


    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <?php include 'js.php' ?>



</body>

<?php


if (isset($_POST['create'])) {
    include 'connection.php';

    $sql_email = $db->prepare('SELECT * FROM users where email = :email');
    $sql_email->execute([
        ':email' => $_POST['email']
    ]);
    $number_of_email = $sql_email->rowCount();
    if ($number_of_email == 0) {
        $kecamatan = $_POST['kecamatan'];
        $kelurahan = $_POST['kelurahan'];
        $kota = $_POST['kota'];
        $provinsi = $_POST['provinsi'];
        $kode_pos = $_POST['kode_pos'];
        $detail_alamat = $_POST['detail_alamat'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $phone_number = $_POST['phone_number'];
        $pass = $_POST['password'];
        $is_admin = 0;

        if ($_POST['password'] == $_POST['repassword']) {
            // //insert address
            $sql_address = $db->prepare("INSERT INTO address (kecamatan_id, kelurahan_id, kota_id, provinsi_id, kode_pos, detail_alamat) 
                VALUES (:1, :2, :3, :4, :5, :6)");
            $sql_address->bindParam(':1', $kecamatan);
            $sql_address->bindParam(':2', $kelurahan);
            $sql_address->bindParam(':3', $kota);
            $sql_address->bindParam(':4', $provinsi);
            $sql_address->bindParam(':5', $kode_pos);
            $sql_address->bindParam(':6', $detail_alamat);

            $sql_address->execute();

            //insert users
            $add_id = 0;
            $sql_address_id = $db->prepare("SELECT * FROM address ORDER BY address_id DESC LIMIT 1");
            $sql_address_id->execute();
            while ($row = $sql_address_id->fetch()) {
                $add_id = $row['address_id'];
            }

            $sql_users = $db->prepare("INSERT INTO users (first_name,second_name,email,password,phone,address_id,is_admin) 
                VALUES (:fn, :sn, :e, :p, :pn, :id, :adm)");
            $sql_users->bindParam(':fn', $first_name);
            $sql_users->bindParam(':sn', $second_name);
            $sql_users->bindParam(':e', $email);
            $sql_users->bindParam(':p', $pass);
            $sql_users->bindParam(':pn', $phone_number);
            $sql_users->bindParam(':id', $add_id);
            $sql_users->bindParam(':adm', $is_admin);

            $sql_users->execute();

            echo '<script>swal("User Created","Happy Shopping","success")</script>';
            header('location:login.php');
        } else {
            echo '<script>swal("Register failed","Password does not match","warning")</script>';
        }
    } else {
        echo '<script>swal("Register failed","Email already taken","warning")</script>';
    }
}

?>

</html>