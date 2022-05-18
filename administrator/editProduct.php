<?php
include("admin_connection.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('head.php') ?>

<body>
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-fullbleed data-push data-responsive-width="992px" data-has-scrolling-region>

        <div class="mdk-drawer-layout__content">
            <!-- header-layout -->
            <div class="mdk-header-layout js-mdk-header-layout  mdk-header--fixed  mdk-header-layout__content--scrollable">
                <!-- header -->
                <?php include 'nav.php'; ?>

                <!-- content -->
                <?php
                   
                    $ip = $_GET['index_product'];
                    $sth = $db->prepare("SELECT * from product where product_id = $ip");
                    $sth->execute();
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
                <div class="container-fluid">
                <div class="card">
                <form action="editProductProcess.php" method="POST" enctype="multipart/form-data">
                    <h3> Edit Product <?php echo $row['product_name'] ?>
                    <br>
                    <br>
                    Product Name
                    <input type="hidden" class="form-control" style="margin-top:10px" placeholder="Product Name" name="product_id" value="<?php echo $row['product_id'] ?>" required>
                    <input type="text" class="form-control" style="margin-top:10px" placeholder="Product Name" name="product_name" value="<?php echo $row['product_name'] ?>" required>
                    Product Weight
                    <input type="text" class="form-control" style="margin-top:10px" placeholder="Product Wight (KG)" name="weight" value="<?php echo $row['weight'] ?>" required>
                    Product Price
                    <input type="number" class="form-control" style="margin-top:10px" placeholder="Product Price" name="price_each" value="<?php echo $row['price_each'] ?>" required>
                    Product Stock
                    <input type="number" class="form-control" style="margin-top:10px" placeholder="Product Stocks" name="stock" value="<?php echo $row['stock'] ?>" required>
                    Product Description
                    <textarea name="description" id="description"> <?php echo urldecode($row['description']) ?></textarea>
                    
                    <input type="submit" value='Edit Items' class="col-lg-12 btn btn-primary" style="margin-top:10px;">
                    </form>
                    </div>
                    </div>
                    </div>
                <?php } ?>
                    
            </div>

        </div>
        <!-- // END drawer-layout__content -->

        <!-- drawer -->
        <?php include('sideDrawer.php'); ?>
        <!-- // END drawer -->

        <!-- drawer -->
        <?php include('rightDrawer.php') ?>
        <!-- // END drawer -->
        


    </div>
    <!-- // END drawer-layout -->



    <!-- jQuery -->
    <script src="assets/vendor/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/popper.js"></script>
    <script src="assets/vendor/bootstrap.min.js"></script>

    <!-- Simplebar -->
    <!-- Used for adding a custom scrollbar to the drawer -->
    <script src="assets/vendor/simplebar.js"></script>


    <!-- Vendor -->
    <script src="assets/vendor/Chart.min.js"></script>
    <script src="assets/vendor/moment.min.js"></script>

    <!-- APP -->
    <script src="assets/js/color_variables.js"></script>
    <script src="assets/js/app.js"></script>


    <script src="assets/vendor/dom-factory.js"></script>
    <!-- DOM Factory -->
    <script src="assets/vendor/material-design-kit.js"></script>
    <!-- MDK -->


    <script>
        CKEDITOR.replace('description');
    </script>



    <script>
        $("#index_brand").change(function() {
            //get category value
            var index_brand = $("#index_brand").val();
            // put your ajax url here to fetch subcategory
            var url = 'selectedCategory.php';
            // call subcategory ajax here 
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    index_brand: index_brand
                },

                success: function(data) {
                    $("#index_category").html(data);
                }
            });
        });
    </script>

    <script>
        $("#index_category").change(function() {
            //get category value
            var index_category = $("#index_category").val();
            // put your ajax url here to fetch subcategory
            var url = 'selectedSubCategory.php';
            // call subcategory ajax here 
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    index_category: index_category
                },

                success: function(data) {
                    $("#index_sub_category").html(data);
                }
            });
        });
    </script>

    <script>
        $(".add1").click(function() {
            var clone = $(".size:first").clone();
            clone.find("input").val("");
            $(".buttonSize").before(clone);
        });

        $(".remove1").click(function() {
            $(".size:last").remove();
        });

        $(".add").click(function() {
            var clone = $(".form-group:first").clone();
            clone.find("input").val("");
            $(".buttonBox").before(clone);
        });

        $(".remove").click(function() {
            $(".form-group:last").remove();
        });
    </script>

    <script>
        (function() {
            'use strict';
            // Self Initialize DOM Factory Components
            domFactory.handler.autoInit()


            // Connect button(s) to drawer(s)
            var sidebarToggle = document.querySelectorAll('[data-toggle="sidebar"]')

            sidebarToggle.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    var selector = e.currentTarget.getAttribute('data-target') || '#default-drawer'
                    var drawer = document.querySelector(selector)
                    if (drawer) {
                        if (selector == '#default-drawer') {
                            $('.container-fluid').toggleClass('container--max');
                        }
                        drawer.mdkDrawer.toggle();
                    }
                })
            })
        })()
    </script>


    <script src="assets/vendor/morris.min.js"></script>
    <script src="assets/vendor/raphael.min.js"></script>
    <script src="assets/vendor/bootstrap-datepicker.min.js"></script>
    <script src="assets/js/datepicker.js"></script>

    <script src="assets/vendor/jquery.dataTables.js"></script>
    <script src="assets/vendor/dataTables.bootstrap4.js"></script>

    <script>
        $('#data-table').dataTable();
    </script>




</body>

</html>