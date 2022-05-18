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
                                <h1>Banner</h1>
                                <button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#myModal"><i class="material-icons md-36 align-middle mb-1 text-primary">add_circle_outline</i> Add Banner </button>
                            </div>
                            <div class="py-4">
                                <div class="table-responsive">
                                    <table id="data-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Banner Name</th>

                                                <th>Option</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sth = $db->prepare("SELECT * FROM tb_banner");
                                            $sth->execute();
                                            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                                            ?>

                                                <tr>
                                                    <td><?php echo $row['nama_banner'] ?></td>

                                                    <td>
                                                    <a href="deleteBanner.php?index_banner=<?php echo $row['index_banner']; ?>"><button class="btn btn-danger btn-sm">Delete Banner</button></td>
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
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <form action="bannerAdd.php" method="POST" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-lg-12">
                                    <input type="text" class="form-control" placeholder="Banner Name" name="banner_name" required>
                                    <br>
                                    <label> Caption 1 </label>
                                    <textarea class="col-lg-12" style="margin-left:1%;" required name="caption_1"></textarea>
                                    <br>
                                    <label> Caption 2</label>
                                    <textarea class="col-lg-12" style="margin-left:1%;" required name="caption_2"></textarea>
                                    <br>
                                    <label> Banner Image (1920 x 950) </label>
                                    <label class="btn btn-outline-success btn-upload" for="inputImage" title="Upload image file">
                                        <input type="file" required name="file" id="inputImage" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                        Select File
                                    </label>
                                    <br>
                                    <br>
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </div>
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
        CKEDITOR.replace('caption_1');
        CKEDITOR.replace('caption_2');
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