        <div class="mdk-drawer js-mdk-drawer" id="user-drawer" data-position="right" data-align="end">
            <div class="mdk-drawer__content">
                <div class="mdk-drawer__inner" data-simplebar data-simplebar-force-enabled="true">
                    <nav class="drawer drawer--light">
                        <div class="drawer-spacer drawer-spacer-border">
                            <div class="media align-items-center">
                                <img src="../../../pbs.twimg.com/profile_images/928893978266697728/3enwe0fO_400x400.jpg" class="img-fluid rounded-circle mr-2" width="35" alt="">
                                <div class="media-body">
                                    <a href="#" class="h5 m-0"><?php echo ucwords($_SESSION['first_name']); ?></a>
                                    <div><?php echo ucwords($_SESSION['first_name']); ?></div>
                                </div>
                            </div>
                        </div>

                        <!-- MENU -->
                        <ul class="drawer-menu" id="userMenu" data-children=".drawer-submenu">
                            <li class="drawer-menu-item">
                                <a href="../index.php">
                                    <i class="material-icons">account_circle</i>
                                    <span class="drawer-menu-text"> Back to Page</span>
                                </a>
                            </li>
                            <li class="drawer-menu-item">
                                <a href="logout.php">
                                    <i class="material-icons">exit_to_app</i>
                                    <span class="drawer-menu-text"> Logout</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>