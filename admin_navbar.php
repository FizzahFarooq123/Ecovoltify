<!--for navbar section-->
<nav class="navbar navbar-expand-lg fixed-top bg-white">
        <div class="container-fluid ms-5">
            <!-- <a class="navbar-brand" href="#">Offcanvas navbar</a> -->
            <div class="logo">
                <a href="homepage.php"><img src="images/ecovoltify_logo.png" alt="logo" class="img-fluid"></a>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: #509046;">EcoVoltify</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 mt-2">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="adminwelcome.php">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="orders.php">ORDERS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="payment.php">PAYMENTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="users.php">USERS</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link nav-products-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            BRANDS
                            </a>
                            <ul class="dropdown-menu dropdown-products p-0">
                            <li><a class="dropdown-item p-2" href="addbrands.php">ADD BRANDS</a></li>
                            <li class="dropdown-divider m-0"></li>
                            <li><a class="dropdown-item p-2" href="viewbrands.php">VIEW BRANDS</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link nav-products-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PRODUCTS
                            </a>
                            <ul class="dropdown-menu dropdown-products p-0">
                            <li><a class="dropdown-item p-2" href="addproducts.php">ADD PRODUCTS</a></li>
                            <li class="dropdown-divider m-0"></li>
                            <li><a class="dropdown-item p-2" href="deleteproducts.php">VIEW & DELETE PRODUCTS</a></li>
                            </ul>
                        </li>
                    </ul>

                    
                    <ul class="navbar-nav" style="gap: 5px;">
                            <li class="nav-item">
                                <?php
                                    if (isset($_SESSION['adminusername'])) {
                                    ?>
                                        <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link mx-lg-5 mt-2" href="adminlogout.php">LOGOUT</a>
                                        </li>
                                        </ul>
                                    <?php
                                    }
                                    else {
                                        ?>
                                        
                                        <li class="nav-item dropdown me-5">
                                            <a class="nav-link nav-account-link dropdown-toggle" style="margin-top: 6px; padding: 9px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                ACCOUNT
                                            </a>
                                            <ul class="dropdown-menu p-0">
                                                <li><a class="dropdown-item p-2" href="user-login.php">USER</a></li>
                                                <li class="dropdown-divider m-0"></li>
                                                <li><a class="dropdown-item p-2" href="admin-login.php">ADMIN</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    }
                                ?>
                                
                        
                        <!-- <li class="nav-item dropdown me-5">
                            <a class="nav-link nav-account-link dropdown-toggle" style="margin-top: 6px; padding: 9px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ACCOUNT
                            </a>
                            <ul class="dropdown-menu p-0">
                                <li><a class="dropdown-item p-2" href="user-login.php">USER</a></li>
                                <li class="dropdown-divider m-0"></li>
                                <li><a class="dropdown-item p-2" href="admin-login.php">ADMIN</a></li>
                            </ul>
                        </li> -->
                        
                    </ul>

                </div>
            </div>
        </div>
    </nav>
<!-- navbar ended -->