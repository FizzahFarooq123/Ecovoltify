<?php
include 'connection.php'; // database connection

if (isset($_GET['query'])) {
    $search = mysqli_real_escape_string($conn, $_GET['query']);

    $sql = "SELECT product_id, product_name, product_description, price, prd_image 
            FROM product 
            WHERE product_name LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="search.css">

    <!-- for search bar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<!--for navbar section-->
    <?php
        include("./navbar.php");
    ?>
<!-- navbar ended -->



    <div class="searchhhh container mt-5">
        <h3>Search Results for: <strong><?php echo htmlspecialchars($search); ?></strong></h3>
        <div class="row mt-4">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 d-flex flex-column">
                            <img src="<?php echo htmlspecialchars($row['prd_image']); ?>" 
                                class="card-img-top" 
                                alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                                
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['product_name']); ?></h5>
                                </div>

                                <div class="mt-auto">
                                    <p class="card-text"><strong>Rs. <?php echo htmlspecialchars($row['price']); ?></strong></p>
                                    <form action="individual_product.php" method="get">
                                        <input type="hidden" name="product_idddd" value="<?php echo $row['product_id']; ?>">
                                        <input type="submit" value="Learn more" class="custom-learn-more-btn mt-2 w-100">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php
                }
            } else {
                echo "<p>No matching products found.</p>";
            }
            ?>
        </div>
        <a href="homepage.php" class="btn btn-secondary mt-4">← Back to Homepage</a>
    </div>

    
<!-- for footer section -->
    <footer>
        <div class="footernav">
            <div class="footernavlist">
                <a href="#home">Home</a>
                <a href="about us.php">About</a>
                <a href="#category">Categories</a>
                <a href="#testimonial">Testimonials</a>
                <a href="#contact">Contact</a>
            </div>
        </div>
        <div class="footerbottom">
            <p>Copyright &copy;2025; EcoVoltify.<span class="Designer">All rights reserved.</span></p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


    <?php
}
?>
