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
                <div class="mdk-header-layout__content top-navbar mdk-header-layout__content--scrollable h-100">
                    <!-- main content -->

                    <div class="container-fluid">

                        <div class="card">

                            <div class="card-header">
                                <h1>Product</h1>
                                <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#Modal"><i class="material-icons md-36 align-middle mb-1 text-primary">add_circle_outline</i> Add Product </button>
                            </div>
                            <div class="py-4">
                                <div class="table-responsive">
                                    <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Stock</th>
                                                <th>Picture</th>
                                                <th>Weight</th>
                                                <th>Delete</th>
                                                <th>Edit</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sth = $db->prepare("SELECT * from product");
                                            $sth->execute();
                                            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                                            ?>

                                                <tr>
                                                    <td><?php echo strtoupper($row['product_id']) ?></td>
                                                    <td><?php echo strtoupper($row['product_name']) ?></td>
                                                    <td><?php echo number_format($row['price_each']) ?></td>
                                                    <td><?php echo urldecode($row['description']) ?></td>
                                                    <td><?php echo strtoupper($row['stock']) ?></td>
                                                    <td><img src="../<?php echo $row['picture'] ?>" width="300"></td>
                                                    <td><?php echo strtoupper($row['weight']) ?> KG</td>

                                                    <td>

                                                        <a href="deleteProduct.php?index_product=<?php echo $row['product_id']; ?>"><button class="btn btn-danger btn-sm mb-3">Delete Product</button>
                                                    </td>
                                                    <td>
                                                       <a href="editProduct.php?index_product=<?php  echo $row['product_id']; ?>"> <button class="btn btn-success btn-sm pull-right"> Edit Product </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- // END drawer-layout__content -->

        <!-- drawer -->
        <?php include('sideDrawer.php'); ?>
        <!-- // END drawer -->

        <!-- drawer -->
        <?php include('rightDrawer.php') ?>
        <!-- // END drawer -->
        <div id="Modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form action="productAdd.php" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-lg-12">

                                    <input type="text" class="form-control" style="margin-top:10px" placeholder="Product Name" name="product_name" required>
                                    <input type="text" class="form-control" style="margin-top:10px" placeholder="Product Wight (KG)" name="weight" required>
                                    <input type="number" class="form-control" style="margin-top:10px" placeholder="Product Price" name="price_each" required>
                                    <input type="number" class="form-control" style="margin-top:10px" placeholder="Product Stocks" name="stock" required>
                                    <textarea name="description" id="description"> </textarea>
                                </div>
                                <br>
                                <hr>
                                <h4>Input Picture</h4>
                                <hr>
                                <label class="btn btn-outline-success btn-upload" for="inputImage" title="Upload image file">
                                    <input type="file" required id="inputImage" name="files[]" multiple accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                    Select File
                                </label>
                                <div>
                                </div>
                                <br>
                                <input type="submit" value='Add Items' class="col-lg-12 btn btn-primary" style="margin-top:10px;">

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>


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
<!--
    <script>
        var $description = CKEDITOR.cke_description.getData();
    </script> -->

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