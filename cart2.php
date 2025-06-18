<?php
    // require('config.php');
    include('connection.php');
    session_start();
    if(!isset($_SESSION['email']))
    {
        echo"
            <script>
                alert('You must login first');
                window.location.href='user-login.php';
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
    <link rel="stylesheet" href="homepage.css">
    <link rel="stylesheet" href="cart.css">

    <!-- for search bar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
</head>
<body>
    <section class="header">
    <!-- ------NAVBAR------ -->
    <?php include('./navbar.php'); ?>
    </section>

    

    <div class="cart-container">
        <div class="cart-heading" style="width: 100%; text-align: left;">
            <h1>Shopping Cart</h1>
        </div>
        <div >
            <div>
                <table>
                    <thead class="text-white">
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php 
                            
                            if(isset($_SESSION['cart']))
                            {
                                $total=0;
                                $finaltotal=0;
                                foreach($_SESSION['cart'] as $key => $value)
                                {
                                    $total = $value['price'] * $value['quantity'];
                                    $finaltotal += $value['price'] * $value['quantity'];
                                    ?>
                                    <form action="cart.php" method="POST">
                                        <tr>
                                            <?php   
                                                $product_id=$value['product_id'];
                                                $selectquery="SELECT * FROM `product` WHERE product_id='$product_id'";
                                                $run_selectquery=mysqli_query($conn,$selectquery);
                                                $result=mysqli_fetch_array($run_selectquery);
                                            ?>
                                            <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                                            <td><input type="hidden" name="product_pic" value="<?php echo $value['product_pic'] ?>"><img style="height: 100px; width:100px" src="<?php echo $value['product_pic'] ?>" alt=""></td>
                                            <td><input type="hidden" name="product_name" value="<?php echo $value['product_name'] ?>"><?php echo $value['product_name'] ?></td>
                                            <td><input type="hidden" name="price2" value="<?php echo $value['price'] ?>">Rs. <?php echo $value['price'] ?></td>
                                            <td><input type="number" min="1" max="<?php echo $result['quantity']?>" name="quantity" value="<?php echo $value['quantity'] ?>"></td>
                                            <td>$ <?php echo $total ?></td>
                                            <input type="hidden" name="item" value="<?php echo $value['product_name'] ?>">
                                            <td><button type="submit" name="update" class="btn">Update</button></td>
                                            <td><button type="submit" name="remove" class="btn">Delete</button></td>
                                            
                                        </tr>
                                    </form>
                                    <?php
                                }
                                $_SESSION['finaltotal']=$finaltotal;
                                // for stripe stuff
                                // $_SESSION['product_name'] = array_column($_SESSION['cart'], 'product_name');
                                // end
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="cart-footer">
                <div class="cart-summary">
                    <div class="total-row">
                        <div class="col"></div>
                        <div class="col"></div> <!-- Empty column for spacing -->
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col total-label"><h3 style="color: #03230e;">Total:</h3></div>
                        <div class="col"></div>
                        <div class="col total-value"><h3>$ <?php echo $finaltotal; ?></h3></div>
                    </div>
                    <div class="checkout-container">
                        <a href="checkout.php">
                            <button class="checkoutbtn btn">CHECKOUT</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        // session_destroy(); 
    ?>

<!-- for footer section -->
    <footer>
        <div class="footernav">
            <div class="footernavlist">
                <a href="homepage.pho">Home</a>
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


    <!-- -----BOOTSTRAP------ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>