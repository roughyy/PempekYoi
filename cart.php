
<!DOCTYPE html>
<html class="no-js" lang="en">

<?php include 'head.php'; ?>
<?php 

if (!isset($_SESSION['user_id'])) {
    ?>
        <script>
            alert("Harap untuk Login terlebih dahulu");
            </script>
    <?php
    header("location:login.php");
}
    
?>


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

        <section class="popular-properties py-[80px] lg:py-[120px]">
            <div class="container">

                <div class="grid grid-cols-12 mb-[-30px] gap-[30px] xl:gap-[50px]">
                    <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">
                        <?php
                        $total = 0;
                        $ongkir = 0;
                        $cart_id = "";
                        $gt = 0;
                        include 'directurl.php';
                        $select_cart = $db->prepare("SELECT product.*, users.*, cart.*, address.*, tb_kecamatan.*, tarif.* from cart LEFT JOIN product ON product.product_id = cart.product_id  LEFT JOIN users ON users.user_id = cart.user_id LEFT JOIN address ON address.address_id = users.address_id LEFT JOIN tb_kecamatan ON tb_kecamatan.index_kecamatan = address.kecamatan_id LEFT JOIN tarif ON tarif.kode_kecamatan = tb_kecamatan.index_kecamatan where status = 0;");
                        $select_cart->execute();
                        while ($row = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                            $ongkir1 = $row['reg'] * $row['weight'] * $row['qty'];

                        ?>
                            <div id="list" class="grid-tab-content active mb-[30px]">
                                <div class="col-span-12">
                                    <div class="grid grid-cols-1 gap-[30px]">
                                        <h3><a href="product_detail.php?p_id=<?php echo $row['product_id'] ?>" class="font-recoleta leading-tight text-[22px] xl:text-lg text-primary"><?php echo $row['product_name'] ?></h3></a>
                                        <div class="overflow-hidden rounded-md drop-shadow-[0px_2px_15px_rgba(0,0,0,0.1)] bg-[#FFFDFC] text-center transition-all duration-300 hover:-translate-y-[10px] flex flex-wrap flex-col md:flex-row items-center py-[25px] px-[25px]">
                                            <div class="relative mb-[15px] lg:mb-[0px] lg:mr-[30px] block w-full lg:max-w-[270px]">
                                                <a href="properties-details.html" class="block">
                                                    <img src="<?php echo $row['picture'] ?>" class="w-full h-full rounded-[6px]" loading="lazy" width="370" height="266" alt="De Parasiya Appartment.">
                                                </a>
                                            </div>
                                            <div class="text-left w-full md:w-auto md:flex-1 3xl:mr-[55px]">

                                                <h2 class="text-primary leading-none text-[10px] font-recoleta mb-[30px]">Harga: IDR <?php echo number_format($row['price_each']) ?></h2>
                                                <h2 class="text-primary leading-none text-[10px] font-recoleta mb-[30px]">QTY: <?php echo number_format($row['qty']) ?></h2>
                                                <h2 class="text-primary leading-none text-[10px] font-recoleta mb-[30px]">Total Berat: <?php echo number_format($row['qty']) .  " KG / IDR " . number_format($ongkir1); ?></h2>


                                                <ul class="flex flex-wrap items-center justify-between text-[12px] mt-[10px] mb-[15px] pb-[10px] border-b border-[#E0E0E0]">
                                                </ul>
                                                <ul>
                                                    <li class="flex flex-wrap items-center justify-between">
                                                        <span class="font-recoleta text-base text-primary leading-none">Total: IDR
                                                            <?php
                                                            $total1 = $row['qty'] * $row['price_each'];
                                                            echo number_format($total1);
                                                            $total = $total + $total1;
                                                            $ongkir = $ongkir + $ongkir1;
                                                            $gt = $ongkir + $total;
                                                            $cart_id = $cart_id . $row['cart_id'] . ",";
                                                            ?></span>
                                                        <span class="flex flex-wrap items-center">

                                                            <button class="hover:text-secondary">
                                                                <a href="deletecart.php?c_id=<?php echo $row['cart_id'] ?>">Delete</a>
                                                            </button>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-[30px]">
                        <aside class="mb-[-40px] asidebar">
                            <div class="bg-[#F5F9F8] px-[20px] lg:px-[15px] xl:px-[35px] py-[50px] rounded-[8px] mb-[40px]">
                                <h3 class="text-primary leading-none text-[24px] font-recoleta mb-[30px]">Ringkasan Belanja</h3>

                                <form action="checkout.php" class="relative" method="POST">
                                    <a class="relative mb-[25px]"> Total Belanja: IDR <?php echo number_format($total); ?> </a>
                                    <input type="hidden" name="total" value="<?php echo $total ?>">

                                    <br>
                                    <br>

                                    <a class="relative mb-[25px]"> Total Ongkos Kirim: IDR <?php echo number_format($ongkir); ?> </a>
                                    <input type="hidden" name="total_ongkir" value="<?php echo $ongkir ?>">
                                    <input type="hidden" name="cart_id" value="<?php echo substr_replace($cart_id, "", -1); ?>">

                                    <ul class="flex flex-wrap items-center justify-between text-[12px] mt-[10px] mb-[15px] pb-[10px] border-b border-[#E0E0E0]">
                                    </ul>
                                    <a class="relative mb-[25px]"> Grand Total: IDR <?php echo number_format($gt); ?> </a>
                                    <input type="hidden" name="gt" value="<?php echo $gt ?>">
                            </div>






                            <button type="submit" class="block z-[1] before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:z-[-1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[12px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:z-[-2] after:bg-primary after:rounded-md after:transition-all">Order</button>

                            </form>
                    </div>
                    </aside>
                </div>
            </div>

    </div>
    </section>

    <!-- Footer Start -->
    <?php include 'footer.php' ?>
    <!-- Footer End -->
    <?php include 'upbut.php' ?>


    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <?php include 'js.php' ?>


</body>

</html>