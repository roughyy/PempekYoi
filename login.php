<!DOCTYPE html>
<html class="no-js" lang="en">

<?php
include 'head.php';
if (isset($_SESSION['user_id'])) {
    header('location:index.php');
} else {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $password = $_POST['password'];
        $admin = $db->prepare('SELECT * FROM users WHERE email = :email and password = :password');
        $admin->execute(array(
            ':email' => $_POST['email'],
            'password' => $password
        ));
        $row = $admin->fetch(PDO::FETCH_ASSOC);

        if (empty($row['user_id'])) {
            header('location:login.php');
        } else {
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['second_name'] = $row['second_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['address_id'] = $row['address_id'];
            $_SESSION['is_admin'] = $row['is_admin'];
            header('location:index.php');
        }
    }
}

?>


<body class="font-ubuntu text-body text-tiny">
    <div class="">

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
                <form action="login.php" method="POST">
                    <div class="grid grid-cols-12 gap-x-[30px] mb-[-30px]">
                        <div class="col-span-12 lg:col-span-6 mb-[30px]">
                            <h2 class="font-recoleta text-primary text-[24px] sm:text-[30px] leading-[1.277] xl:text-xl mb-[15px]">
                                Login to Pempek Yoi<span class="text-secondary">.</span></h2>


                            <div class="grid grid-cols-12 gap-x-[20px] gap-y-[35px]">

                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="email" placeholder="Email" name="email">
                                </div>


                                <div class="col-span-12">
                                    <input class="font-light w-full sm:w-[400px] leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] p-[15px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] " type="password" placeholder="Password" name="password">

                                </div>



                                <div class="col-span-12">
                                    <div class="flex flex-wrap items-center">
                                        <button type="submit" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[40px] py-[15px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all">Login</button>
                                        <a href="register.php" class="font-medium text-primary hover:text-secondary ml-[40px]">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-12 lg:col-span-6 mb-[30px]">
                            <img src="assets/images/logo (2) (1).22-05-08.png" class="w-full h-auto rounded-[10px]" width="546" height="478" alt="image">
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

</html>