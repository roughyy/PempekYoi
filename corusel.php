<section class="hero-section bg-white">
    <div class="hero-slider2 overflow-hidden">
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- swiper-slide start -->

                <?php
                $sth = $db->prepare("SELECT * FROM tb_banner");
                $sth->execute();
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="swiper-slide bg-no-repeat bg-left-bottom bg-sky-100 z-[1] relative before:absolute before:w-full before:h-full before:inset-0 before:content-[''] before:bg-[#000000] before:opacity-[50%] before:z-[-1] py-[80px] lg:py-[125px]" style="background-image: url('<?php echo $row['banner_photo'] ?>');">
                        <div class="container">
                            <div class="col-span-12 xl:col-span-10">
                                <ul class="flex flex-wrap items-center sm:justify-between text-white mt-[-20px] mb-[10px] lg:mb-[60px]">

                                    <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">

                                    </li>



                                </ul>
                                <ul class="flex flex-wrap items-center sm:justify-between text-white mt-[-20px] mb-[10px] lg:mb-[60px]">

                                    <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">

                                    </li>



                                </ul>
                            </div>
                            <div class="col-span-12 xl:col-span-10">
                                <ul class="flex flex-wrap items-center sm:justify-between text-white mt-[-20px] mb-[10px] lg:mb-[60px]">

                                    <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">

                                    </li>



                                </ul>
                                <ul class="flex flex-wrap items-center sm:justify-between text-white mt-[-20px] mb-[10px] lg:mb-[60px]">

                                    <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">

                                    </li>



                                </ul>
                            </div>
                            <div class="grid grid-cols-12">
                                <div class="col-span-12">
                                    <div class="slider-content">
                                        <div class="relative mb-5 sub_title">
                                            <span class="text-base text-white block"><?php echo $row['caption_1'] ?></span>
                                        </div>
                                        <h1 class="font-recoleta text-white text-[36px] sm:text-[50px] md:text-[68px] lg:text-[50px] leading-tight xl:text-2xl title">
                                            <span><?php echo $row['caption_2'] ?></span>
                                        </h1>



                                    </div>
                                </div>


                                <div class="col-span-12 xl:col-span-10">
                                    <ul class="flex flex-wrap items-center sm:justify-between text-white mt-[-20px] mb-[10px] lg:mb-[60px]">

                                        <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">

                                        </li>



                                    </ul>
                                    <ul class="flex flex-wrap items-center sm:justify-between text-white mt-[-20px] mb-[10px] lg:mb-[60px]">

                                        <li class="pr-[30px] sm:pr-[35px] lg:pr-[70px] sm:border-r sm:border-[#E0E0E0] my-[20px]">

                                        </li>



                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- swiper-slide end-->
                <!-- swiper-slide start -->

                <!-- swiper-slide end-->
                <!-- swiper-slide start -->

                <!-- swiper-slide end-->

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination home-pagination-six hidden lg:flex flex-wrap flex-col items-end"></div>
        </div>
    </div>
</section>