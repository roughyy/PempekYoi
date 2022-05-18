<!DOCTYPE html>
<html class="no-js" lang="en">

<?php include 'head.php'; ?>


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
        <?php
        $product = $_GET['p_id'];
        $select_product = $db->prepare("SELECT * from product where product_id = $product");
        $select_product->execute();
        while ($row = $select_product->fetch(PDO::FETCH_ASSOC)) {

        ?>
            <section class="popular-properties py-[80px] lg:py-[120px]">
                <div class="container">
                    <h2 class="font-recoleta leading-tight text-[22px] md:text-[28px] lg:text-[36px] mb-[30px]" style="color: #052c4a">
                        <?php echo $row['product_name'] ?></h2>
                    <div class="grid grid-cols-12 mb-[-30px] gap-[30px] xl:gap-[50px]">
                        <div class="col-span-12 md:col-span-6 lg:col-span-8 mb-[30px]">
                            <img src="<?php echo $row['picture'] ?>" alt="Gambar pempek" width="500">
                            <div class="mt-[45px] mb-[35px]">
                                <p><?php echo urldecode($row['description']) ?></p>
                            </div>
                        </div>

                        <div class="col-span-12 md:col-span-6 lg:col-span-4 mb-[30px]">
                            <aside class="mb-[-40px] asidebar">
                                <div class="bg-[#F5F9F8] px-[20px] lg:px-[15px] xl:px-[35px] py-[50px] rounded-[8px] mb-[40px]">
                                    <h3 class="leading-none text-[24px] font-recoleta mb-[30px]" style="color: #052c4a;">Order</h3>

                                    <form action="add_to_cart.php" class="relative" method="POST" onsubmit="alert('Product has been added to your cart ');">
                                        <input name="product_id" type="hidden" value="<?php echo $product ?>">
                                        <?php if ($row['stock'] >= 0) {
                                        ?>
                                            <div class="relative mb-[25px] bg-white">
                                                <input type="number" name="product_qty" class="font-light w-full leading-[1.75] placeholder:opacity-100 placeholder:text-body border border-primary border-opacity-60 rounded-[8px] pl-[20px] pr-[20px] py-[10px] focus:border-[#FD6400] focus:border-opacity-60 focus:outline-none focus:drop-shadow-[0px_6px_15px_rgba(0,0,0,0.1)] bg-white" placeholder="Qty" required>
                                            </div>
                                            <button type="submit" class="block z-[1] before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:z-[-1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[30px] py-[12px] capitalize font-medium text-white text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:z-[-2] after:bg-primary after:rounded-md after:transition-all">Order</button>

                                        <?php
                                        } else {
                                            echo "Produk Habis";
                                        } ?>

                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>

                </div>
            </section>
        <?php } ?>



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