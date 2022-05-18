<section class="about-section py-[80px] lg:py-[10px]">
    <div class="container">
        <?php
        $sth = $db->prepare("SELECT * FROM tb_aboutus limit 1");
        $sth->execute();
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="grid grid-cols-12 gap-x-[10px] mb-[-10px]">
                <div class="col-span-12 lg:col-span-6 relative mb-[10px]">
                    <div class="scene" data-relative-input="true">
                        <img class="block mx-auto" data-depth="0.1" src= "<?php echo $row['about_us_img'] ?>" loading="lazy" width="520" height="467" alt="about Image">
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6 mb-[10px]">
                    <br><br>
                    <div>
                        <?php echo $row['about_us'] ?>
                    </div>                     
                </div>
            </div>
        <?php } ?>
    </div>
</section>