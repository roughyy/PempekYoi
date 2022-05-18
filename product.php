<!DOCTYPE html>
<html class="no-js" lang="en">

<?php include 'head.php'; ?>


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

        <section class="popular-properties py-[80px] lg:py-[120px]">
            <div class="container">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-[30px]">
                    <?php
                    $select_product = $db->prepare("SELECT * from product");
                    $select_product->execute();
                    while ($row = $select_product->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="overflow-hidden rounded-md drop-shadow-[0px_2px_15px_rgba(0,0,0,0.1)] bg-[#FFFDFC] text-center transition-all duration-300 hover:-translate-y-[10px]">
                            <div class="relative">
                                <a href="product_detail.php?p_id=<?php echo $row['product_id'] ?>" class="block">
                                    <img src="<?php echo $row['picture'] ?>" class="w-full h-full" loading="lazy" width="300" height="300" alt="<?php echo $row['product_name'] ?>">
                                </a>
                                <?php
                                if ($row['stock'] <= 0) {
                                ?>
                                    <span class="absolute bottom-5 left-5 bg-[#FFFDFC] p-[5px] rounded-[2px] text-secondary leading-none text-[14px] font-normal capitalize">Sold Out</span>
                                <?php } ?>
                            </div>

                            <div class="py-[20px] px-[20px] text-left">
                                <h3><a href="product_detail.php?p_id=<?php echo $row['product_id'] ?>" class="font-recoleta leading-tight text-[22px] xl:text-lg " style="color:#052c4a ;"><?php echo $row['product_name'] ?></a></h3>
                                <ul class="flex flex-wrap items-center justify-between text-[12px] mt-[10px] mb-[15px] pb-[10px] border-b border-[#E0E0E0]">
                                </ul>
                                <ul>
                                    <li class="flex flex-wrap items-center justify-between">
                                        <span class="font-recoleta text-base  leading-none" style="color: #052c4a;">IDR <?php echo number_format($row['price_each']) ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- About Us Sectin Start -->

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