<?php
include 'connection.php';
session_start();
if(isset($_GET['product_idddd'])){
    $product_id=$_GET['product_idddd'];
    $query="SELECT * FROM product WHERE product_id=$product_id";
    $query_result = mysqli_query($conn, $query);
    // yeh command execute kaewaye ga aur true false return karega
    $row = mysqli_fetch_array($query_result);
    // jo result execute hoke ayega woh iss array main jata jaye ga

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
    .pic_info input[type="submit"]{
        /* margin-top: 100px; */
        display: block !important;
        width: 140px !important;
        /* margin-left: 46px;
        margin-bottom: 2px;
        margin-top: 16px; */
        padding: 5px 10px !important;
        text-align: center !important;
        background-color: #f4fcda !important;
        color: #084236 !important;
        text-decoration: none !important;
        font-size: 1.2em !important;
        border-radius: 20px !important;
        border: 2px solid #084236 !important;
        transition: background-color 0.3s ease !important;
    }
    
.pic_info input[type="submit"]:hover {
        background-color: #084236 !important;
        color: #f4fcda !important;
    }
    
.pic_info input[type="submit"]:active {
        transform: scale(0.98) !important;
    }
</style>

<body>
<!--for navbar section-->
    <?php
        include("./navbar.php");
    ?>
<!-- navbar ended -->

<!-- for info part -->
 


<div class="main_one" style="margin-top: 120px;">
    <?php
        // include('connection.php');
        // if(isset($_POST['add'])){
        //     $var = $_POST['product_idddd'];
        // }
        // $query1 = "SELECT product.product_name, product.prd_image, product.product_description, product.price, 
        //         product.carbon_footprint, product.energy_efficiency, product.warranty, product.wattage, 
        //         product.voltage, product.quantity, 
        //         brand.brand_name FROM product JOIN brand ON product.brand_id = brand.brand_id 
        //         WHERE product_id='$var'";
        // $result = mysqli_query($conn,$query1);
        // $result2=mysqli_fetch_array($result);
    ?>

    <div class="ind_pic">
        <img src="<?php echo $row['prd_image'] ?>" alt="" height="500px" width="500px">
    </div>
    <div class="pic_info">
        <form action="cart.php" method="POST">

            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name'] ?>">
            <input type="hidden" name="product_pic" value="<?php echo $row['prd_image'] ?>">
            <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
            <input type="hidden" name="price2" value="<?php echo $row['price2'] ?>">

            <h1 style="font-size: 43px; font-weight:bolder;text-align:left; color: #084236"><?php echo $row['product_name'] ?></h1>
            <p style="font-size: 23px; font-weight:normal;text-align:justify"><?php echo $row['product_description'] ?></p>
            <p style="font-size: 23px; font-weight:bold;text-align:justify; color: #006d2c"><?php echo $row['price'] ?></p>
            <p style="font-size: 23px; font-weight:bold;text-align:justify"><span>Carbon Footprint:</span> <span style="color:#006d2c;"><?php echo $row['carbon_footprint'] ?></span></p>
            <p style="font-size: 23px; font-weight:bold;text-align:justify"><span>Energy Efficiency:</span> <span style="color:#006d2c;"><?php echo $row['energy_efficiency'] ?></span></p>
            <p style="font-size: 23px; font-weight:bold;text-align:justify"><span>Warranty: </span> <span style="color:#006d2c;"><?php echo $row['warranty'] ?></span></p>
            <p style="font-size: 23px; font-weight:bold;text-align:justify"><span>Wattage: </span> <span style="color:#006d2c;"><?php echo $row['wattage'] ?></span></p>
            <p style="font-size: 23px; font-weight:bold;text-align:justify"><span>Voltage: </span><span style="color:#006d2c;"><?php echo $row['voltage'] ?></span></p>
            <label for="quantity" style="font-size: 23px; font-weight:bold;text-align:justify">Quantity (<?php echo $row['quantity'] ?> left in stock):</label>
            <input type="number" value="1" id="quantity" name="quantity" min="1" max="<?php echo $row['quantity'] ?>" style="font-size: 23px; font-weight:bold;text-align:justify">

            <div class="productmore-btn" style="padding-top: 10px; padding-bottom:20px">
            <!-- <button type="submit"></button>
                <a href="" class="more-button1" id="redirectButton">Add to cart</a> -->
                <input type="submit" name="addtocart" value="Add to Cart">
            </div>
        </form>
        

        
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