<?php
include 'connection.php';
session_start();
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
    <link rel="stylesheet" href="products_styling.css">
    <!-- for search bar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<!--for navbar section-->
    <?php
        include("./navbar.php");
    ?>
<!-- navbar ended -->

<!-- for makeup section -->
    <div class="pt-5 power-page" style="margin-top: 96px;">
        <h1 style="color: #00441b; font-weight: bolder; margin-left: 100px;">Shop For Power And Energy Products</h1>
        <div class="topcards p-4">
            <?php
            $query = 'SELECT * FROM product WHERE category_id=1';
            $query_result = mysqli_query($conn, $query);
            // query ko execute karaye ga 

            // sab kuch result main jo aya hai usse array ki form main store karaye ga
            // echo 'executed';
            while ($row = mysqli_fetch_array($query_result)) {
            ?>
                <div class="card col-lg-3 col-md-6 col-sm-12">

                    <form action="individual_product.php" method="get">
                        <input type="hidden" name="product_idddd" value="<?php echo $row['product_id'] ?>">

                        <img src="<?php echo $row['prd_image'] ?>" class="card-img-top" alt="..." height="360">
                        <div class="card-body">
                            <h5 class="card-title mb-0" style="color: #00441b; font-weight:900 !important; height:80px"><?php echo $row['product_name'] ?></h5>
                            <h5 class="card-title mb-0" style="color: black; font-weight:900 !important; "><?php echo $row['price'] ?></h5>
                            
                        </div>
                    </form>

                    <div class="productmore-btn d-flex justify-content-between gap-0 mb-2 ps-3 pe-3">
                        
                        <form action="cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                            <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
                            <input type="hidden" name="product_pic" value="<?php echo $row['prd_image'] ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                            <input type="hidden" name="price2" value="<?php echo $row['price2'] ?>">
                            <input type="hidden" name="quantity" value="1">
                            <input type="submit" name="addtocart" value="Add to Cart" class="more-button2">
                        </form>

                        <form action="individual_product.php" method="get">
                            <input type="hidden" name="product_idddd" value="<?php echo $row['product_id'] ?>">
                            <input type="submit" value="Learn more" class="more-button1">
                        </form>
                    </div>
                    
                </div>
            <?php

            }

            ?>

        </div>
        
    </div>

<!-- for footer section -->
<footer>
    <div class="footernav">
        <div class="footernavlist">
            <a href="homepage.php">Home</a>
            <a href="about us.php">About</a>
            <a href="homepage.php #category">Categories</a>
            <a href="homepage.php #testimonial">Testimonials</a>
            <a href="homepage.php #contact">Contact</a>
        </div>
    </div>
    <div class="footerbottom">
        <p>Copyright &copy;2025; EcoVoltify.<span class="Designer">All rights reserved.</span></p>
    </div>
</footer>
   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>