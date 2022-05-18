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
                                <h1>Edit About Us</h1>                   
                                                               
                            </div>
                            <div class="py-4">
                                <div class="modal-body">
                                    <?php
                                        $sth = $db->prepare("SELECT * FROM tb_aboutus limit 1");
                                        $sth->execute();
                                        while( $row = $sth->fetch(PDO::FETCH_ASSOC) ) {
                                    ?>
                                        <form action="aboutUs_.php" method="POST" enctype='multipart/form-data'>
                                            <div class="form-row">
                                                <div class="col-lg-12">
                                                    <label> About Us</label>
                                                    <textarea type="text" class="form-control" placeholder="Banner Name" name="aboutus" required><?php echo $row['about_us']; ?></textarea>
                                                    <br>
                                                    <label> Banner Image (700 x 700) </label>
                                                    <label class="btn btn-outline-success btn-upload" for="inputImage" title="Upload image file">
                                                        <input type="file" name="file"  id="inputImage" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                                            Select File
                                                    </label><br>
                                                    <input type="submit" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </form> 
                                            
                                    <?php } ?>
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
        <?php include ('rightDrawer.php') ?>
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
        CKEDITOR.replace( 'aboutus' );
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