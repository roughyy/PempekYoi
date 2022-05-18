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

                        <div class="card card-earnings">
                            <div class="card-group">


                                <div class="card card-body mb-0">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <p class="card-text text-muted mb-1">Welcome</p>
                                            <h1 class="mb-0 font-weight-normal"><?php echo ucwords($_SESSION['first_name']); ?> !</h1>
                                        </div>

                                    </div>
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




</body>

</html>