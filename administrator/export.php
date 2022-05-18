<?php
    include("admin_connection.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('head.php') ?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
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
                                <h1>Export Report</h1>                   
                                <div class="card-body">
                               
                                <form action="exportreport.php" method="POST">
                                    <br>
                                    <button class="btn btn-primary">Export</button>
                                
                                </form>
                                
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

    <script src="assets/vendor/jquery.dataTables.js"></script>
    <script src="assets/vendor/dataTables.bootstrap4.js"></script>

    <script>
        $('#data-table').dataTable();
    </script>

    


</body>

</html>