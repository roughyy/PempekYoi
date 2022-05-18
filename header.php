<header id="sticky-header" class="relative bg-[#F5F9F8] lg:py-[5px] z-10 secondary-sticky secondary-sticky">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="flex flex-wrap items-center justify-between">
                    <a href="index.php" class="block">
                        <img class="w-full h-full p-3" src="assets/images/logo/logo.png" loading="lazy" style="width:30%" alt="brand logo">
                    </a>
                    <nav class="flex flex-wrap items-center">
                        <ul class="hidden lg:flex flex-wrap items-center font-recoleta text-[16px] xl:text-[18px] leading-none text-black">
                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">
                                <a href="index.php" class="transition-all hover:text-secondary">Home</a>
                            </li>
                            <li class="mr-7 xl:mr-[40px] relative group py-[20px]">

                                <a href="product.php" class="transition-all hover:text-secondary">Product</a>
                            </li>

                            <?php

                            if (isset($_SESSION['user_id'])) {
                            ?>
                                <?php if ($_SESSION['is_admin'] == "1") {
                                ?>
                                    <li class="mr-7 xl:mr-[40px] relative group py-[20px]">
                                        <a href="administrator/adminHome.php" class="transition-all hover:text-secondary">Administrator</a>
                                    </li>
                                <?php
                                } ?>
                                <li class="mr-7 xl:mr-[40px] relative group py-[20px]">
                                    <a href="logout.php" class="transition-all hover:text-secondary">Logout</a>
                                </li>
                            <?php } else {
                            ?>
                                <li class="mr-7 xl:mr-[40px] relative group py-[20px]">
                                    <a href="login.php" class="transition-all hover:text-secondary">Login</a>
                                </li>
                            <?php } ?>



                            <li>
                                <a href="cart.php" class="before:rounded-md before:block before:absolute before:left-auto before:right-0 before:inset-y-0 before:-z-[1] before:bg-secondary before:w-0 hover:before:w-full hover:before:left-0 hover:before:right-auto before:transition-all leading-none px-[20px] py-[15px] capitalize font-medium text-white hidden sm:block text-[14px] xl:text-[16px] relative after:block after:absolute after:inset-0 after:-z-[2] after:bg-primary after:rounded-md after:transition-all">Cart</a>
                            </li>
                            <li class="ml-2 sm:ml-5 lg:hidden">
                                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle flex text-[#016450] hover:text-secondary">
                                    <svg width="24" height="24" class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>