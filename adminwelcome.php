<?php
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['adminusername']) ){
        echo"
            <script>
            alert('Admin must login first');
            window.location.href='admin-login.php';
            </script>
        ";
    }
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/leaf.png" />
    <title>EcoVoltify</title>
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- monserrat -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- ------SWIPER JS------ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- -----SCROLL REVEAL----- -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <!-- css links -->
    <link rel="stylesheet" href="individual_product.css">
    <!-- for search bar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
*{
    margin: 0;
    scroll-behavior: smooth;
    font-family: "Montserrat", sans-serif;
}

.logo img{
    height: 70px;
    width: 200px;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    z-index: 1;
}

.nav-item:hover .dropdown-menu {
    display: block;
  }

.nav-account-link{
    display: block;
    background-color:white; 
    border: 2px solid #509046;
    color: #509046 !important; 
    transition: 0.3s ease; 
    text-decoration: none;
}
.nav-account-link:hover{
    color: black !important;
    background-color: #509046;
    text-decoration: none;
}

.dropdown-menu a+a{
    background-color: white;
    color: black;
    border: 1px solid #509046;
}

.dropdown-menu{
    background-color: white;
    border: 1px solid #509046;
    /* color: #006d2c; */
}

.dropdown-menu .dropdown-item{
    color: #509046;
    font-size: medium;
    font-weight: bold;
    /* display: flex;
    justify-content: center; */
    /* align-items: center; */
}

.dropdown-menu li:hover {
    background-color: #f4fcda;
}

.dropdown-menu li:hover .dropdown-item{
    background-color: inherit;
}

/* not working */
.dropdown-divider{
    height: 0;
    margin: var(--bs-dropdown-divider-margin-y);
    overflow: hidden;
    border-top: 1px solid var(--bs-dropdown-divider-bg) !important;
    opacity: 1;
}
/* not working */

.nav-item a{
    font-weight:bold;
    font-size:medium;
    color: black;
    transition: 0.3s ease;
    font-family: "Poppins", sans-serif;
}

.nav-item a:hover {
    box-shadow:0 3px 0 0 black;
    color: #509046;
}
.nav-item a.active {
    box-shadow: 0 3px 0 0 black;
}

.nav-products-link{
    display: block;
    background-color:white; 
    /* border: 2px solid #509046; */
    color: #509046; 
    transition: 0.3s ease; 
    text-decoration: none;
}

@media(min-width:992px){
    .navbar-expand-lg .nabar-nav{
        flex-direction: row;
    }
}

/* .cart{
    height: 55px;
    width: 55px;
    background-color: transparent;
    border: none;
    transition: 0.3s ease;
}

.cart:hover{
    background-color: #f4fcda;
    
} */
/* navbar ended */
.mycards{
        display: flex;
        /* justify-content: center; */
        padding-top: 50px;
        align-items: center;
        flex-wrap: wrap;
        flex-direction: column;
        background-color: #ecfadc;
    }
    .mycards .allcards{
        width: 90%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 2rem;
    }
    .mycards .allcards .card{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color:  white;
        box-shadow: 0 15px 35px 0 rgba(124, 175, 115, 0.4);
        border: 1px solid #084236;
    }
    .mycards .allcards .card .card-body{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .btn a{
        text-decoration: none;
        color:#084236
    }
    .btn{
        border: #084236 1px solid;
        color: #084236;
        transition: 0.5s;
        margin-bottom: 2%;
    }
    .btn:hover{
        background-color: #084236;
        color: white;

    }
    .btn:hover a{
        color: white;

    }

</style>

<body style="height: 100vh !important; background-color:#ecfadc;">
    <!--for navbar section-->
        <?php
            include("./admin_navbar.php");
        ?>
    <!-- navbar ended -->

    <!-- for info part -->
    <!-- -----HEAD----- -->
    <div class="container" style="padding-top:90px;">
            <div class="row">
                <div class="col-lg-12 text-center mb-5 " style="background-color:  #084236; padding: 10px">
                    <h1 style="font-family: 'montserrat'; font-weight:bold; letter-spacing: 0.2rem; color: white">
                    Welcome <?php echo $_SESSION['adminusername']; ?> !</h1>
                </div>
            </div>
        </div>

        <div class="mycards">
            <div class="allcards">
                
                <div class="card" style="width: 250px; height:300px;">
                    <div class="card-body">
                        <img width="48" height="48" src="https://img.icons8.com/fluency/48/tag.png" alt="tag"/>
                        <h5 class="card-title">Brands</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Our Products' Brands</h6>
                        <p class="card-text">Click here to view all brands of our procuts.</p>
                        <button class="btn"><a href="viewbrands.php" class="card-link">View brands</a></button>
                        <button class="btn"><a href="addbrands.php" class="card-link">Add brands</a></button>
                        
                    </div>
                </div>
                <div class="card" style="width: 250px; height:300px;">
                    <div class="card-body">
                        <img width="48" height="48" src="https://img.icons8.com/emoji/48/package-.png" alt="package-"/>
                        <h5 class="card-title">Products</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Our Prodcuts</h6>
                        <p class="card-text">Click on the following links to view, add or delete products.</p>
                        <button class="btn"><a href="addproducts.php" class="card-link">Add products</a></button>
                        <button class="btn"><a href="deleteproducts.php" class="card-link">View/delete Products</a></button>
                        
                    </div>
                </div>
                <div class="card" style="width: 250px; height:300px;">
                    <div class="card-body">
                        <img width="48" height="48" src="https://img.icons8.com/color/48/group-foreground-selected.png" alt="group-foreground-selected"/>
                        <h5 class="card-title">Users</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Registered Users</h6>
                        <p class="card-text">Click here to view all details related to our registered users.</p>
                        <button class="btn"><a href="users.php" class="card-link">Users</a></button>
                        
                    </div>
                </div>
                <div class="card" style="width: 250px; height:300px;">
                    <div class="card-body">
                        <img width="48" height="48" src="https://img.icons8.com/fluency/48/purchase-order.png" alt="purchase-order"/>
                        <h5 class="card-title">Orders</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Manage & view orders</h6>
                        <p class="card-text">Click here to view & manage all orders.</p>
                        <button class="btn"><a href="orders.php">Manage orders</a></button>
                        
                    </div>
                </div>
            </div>
        </div>

 





   




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>