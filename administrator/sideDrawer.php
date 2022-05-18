<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">

            <nav class="drawer  drawer--dark">
                <div class="drawer-spacer">
                    <div class="media align-items-center">
                        <div class="media-body">
                            <a href="adminHome.php" class="h5 m-0 text-link">Home</a>
                        </div>
                    </div>
                </div>
                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Administration
                </div>
                <!-- MENU -->
                <ul class="drawer-menu" id="dasboardMenu" data-children=".drawer-submenu">


                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#mainMenu" href="#" data-target="#uiComponentsMenu" aria-controls="uiComponentsMenu" aria-expanded="false" class="collapsed">
                            <i class="material-icons">store</i>
                            <span class="drawer-menu-text">Product Management</span>
                        </a>
                        <ul class="collapse " id="uiComponentsMenu">
                            <li class="drawer-menu-item "><a href="product.php">Product</a></li>

                        </ul>
                    </li>

                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#mainMenu" href="#" data-target="#pageManagement" aria-controls="pageManagement" aria-expanded="false" class="collapsed">
                            <i class="material-icons">tab</i>
                            <span class="drawer-menu-text">Pages Management</span>
                        </a>
                        <ul class="collapse " id="pageManagement">
                            <li class="drawer-menu-item "><a href="aboutUs.php">About Us</a></li>
                            <li class="drawer-menu-item "><a href="banner.php">Banner</a></li>
                        </ul>
                    </li>

                </ul>

                <!-- HEADING -->
                <div class="py-2 drawer-heading">
                    Sales
                </div>

                <!-- MENU -->
                <ul class="drawer-menu" id="mainMenu" data-children=".drawer-submenu">



                    <li class="drawer-menu-item drawer-submenu">
                        <a data-toggle="collapse" data-parent="#mainMenu" href="#" data-target="#formsMenu" aria-controls="formsMenu" aria-expanded="false" class="collapsed">
                            <i class="material-icons">library_books</i>
                            <span class="drawer-menu-text">Order book</span>
                        </a>
                        <ul class="collapse " id="formsMenu">
                            
                            <li class="drawer-menu-item "><a href="export.php">Export Report</a></li>

                        </ul>
                    </li>
                    <li class="drawer-menu-item  ">
                        <a href="charts.html">
                            <!-- <i class="material-icons">equalizer</i>
       <span class="drawer-menu-text"> Reporting</span>-->
                        </a>
                    </li>


                </ul>


                <!-- HEADING -->

                </ul>

            </nav>
        </div>
    </div>
</div>