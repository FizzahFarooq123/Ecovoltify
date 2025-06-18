<?php
    session_start();
    include('connection.php');
    $userid=$_SESSION['userid'];
    if(!isset($_SESSION['email']))
    {
        echo"
            <script>
                alert('You must login first');
                window.location.href='user-login.php';
            </script>
        ";
    }
    if(isset($_GET['apply'])){
        $donation = $_GET['donation'];
        $_SESSION['donation'] = $donation; // ✅ Save donation to session
    }
    // so that the donation stays upon page reload
    elseif (isset($_SESSION['donation'])) {
        $donation = $_SESSION['donation']; // reuse donation from session
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
    

    <!-- for search bar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    .checkout-container {
  display: flex;
  justify-content: space-between;
  width: 100%; /* take full width */
  margin: 0; /* remove side margins */
  padding: 40px; /* optional, adjust spacing */
  gap: 40px;
  flex-wrap: wrap;
}

.checkout-left {
    flex: 1;
}

.checkout-right {
    flex: 1;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px #ddd;
}

.checkout-left, .checkout-right {
    padding: 30px;
}

.checkout-left h2, .checkout-right h2 {
    margin-bottom: 20px;
    font-size: 1.2rem;
}


.user-details-heading {
    margin-top: 20px;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 1.5rem;
}

.checkout-form {
    width: 100%;
    display: flex;
    flex-direction: column;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.form-group input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
}

.form-row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap; /* helps on smaller screens */
}

.form-group.half {
    flex: 1;
}


input[type="text"], input[type="email"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.input-group {
    display: flex;
    gap: 10px;
}

.express-buttons button {
    padding: 12px;
    margin: 5px 0;
    width: 100%;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

.stripe-pay { background-color: #5A31F4; color: white; }


.product-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    align-items: center;
}

.product-item img {
    width: 50px;
    border-radius: 6px;
    margin-right: 10px;
}

.product-details {
    display: flex;
    flex-direction: column;
}

.subtotal {
    display: flex;
    justify-content: space-between;
    font-weight: bold;
    margin-top: 20px;
}

.total {
    display: flex;
    justify-content: space-between;
    font-size: 1.3rem;
    margin-top: 20px;
}

.discount-code input {
    width: 70%;
    padding: 8px;
    margin-top: 20px;
}

.discount-code button {
    padding: 9px;
    background-color: #eee;
    border: 1px solid #ccc;
    cursor: pointer;
}

.under-heading h2 {
    font-size: 2rem;
    display: inline-block;
    margin-bottom: 30px;
    position: relative;
    color: #03230e;
    text-align: left; /* Ensure the heading text is left-aligned */
}

.under-heading h2::after {
    content: '';
    position: absolute;
    bottom: -15px; /* distance from the text */
    left: 0;
    width: 80px; /* length of the underline */
    height: 1.5px;
    background-color: #03230e;
    border-radius: 2px;
}

/* Responsive adjustments */
@media (max-width: 1024px) {
    .checkout-container {
        flex-direction: column; /* Stack items vertically */
        gap: 20px; /* Reduce gap between columns */
    }

    .checkout-left, .checkout-right {
        width: 100%; /* Make both columns take full width on smaller screens */
        border-right: none; /* Remove border between columns */
    }

    .checkout-right {
        margin-top: 20px;
    }

    .product-item {
        flex-direction: column;
        align-items: flex-start;
    }

    .subtotal, .total {
        flex-direction: column;
        align-items: flex-start;
    }

    .discount-code input {
        width: 100%;
    }
}

@media (max-width: 600px) {
    .express-buttons button {
        font-size: 1rem;
        padding: 10px;
    }

    .checkout-left h2, .checkout-right h2 {
        font-size: 1rem;
    }

    .subtotal, .total {
        font-size: 1rem;
    }

    .form-row {
        flex-direction: column;
    }
}

</style>
<body>
    <section class="header">
        <!-- ------NAVBAR------ -->
        <?php include('./navbar.php') ?>
    </section>

    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12 text-center mb-5 rounded" style="background-color:#f7f6f6;">
                <h1 style="font-family: 'Dancing Script', cursive; font-weight:bold;">Checkout</h1>
            </div>
        </div> -->
    </div>


    <div class="checkout-container" style="padding-top: 110px;">
        <div class="checkout-left">
            <div class="under-heading">
                <h2>Checkout</h2>
            </div>
            

            <div class="user-details-heading">
                <h2>Your Details</h2>
            </div>

            <form class="checkout-form" action="submit.php" method="post">
                <?php
                    $query= "SELECT * FROM `user` WHERE user_id ='$userid'";
                    $result = mysqli_query($conn, $query);
                    $name=mysqli_fetch_array($result);
                ?>
                <div class="form-group">
                    <input type="text" name="name" placeholder="Enter your full name" value="<?php echo $name['name'] ?>" required>
                </div>
                <div class="form-group" style="position: relative;">
                    <input type="text" name="email" placeholder="Enter your email" autocomplete="off" value="<?php echo $name['email'] ?>">
                    <ul id="email-suggestions" style="position: absolute; top: 100%; left: 0; background: white; border: 1px solid #ccc; width: 100%; z-index: 1000; display: none; list-style: none; padding: 0; margin: 0;"></ul>
                </div>
                <div class="form-group">
                    <input type="text" name="phoneno" placeholder="Enter your phone no." required>
                </div>
                

                <div class="form-group">
                    <input type="text" name="address" placeholder="Enter your address" required>
                </div>
                <div class="form-row">
                    <div class="form-group half">
                        <input type="text" name="postal_code" placeholder="Postal Code" required>
                    </div>
                    <div class="form-group half">
                        <input type="text" name="city" placeholder="City" required>
                    </div>
                </div>

                <div class="express-buttons">
                    <button type="submit" name="placeorder" class="stripe-pay">Place Order</button>
                </div>

                <!-- to fill the new field of address etc in user table -->
                <input type="hidden" name="user_id" value="<?php echo $userid; ?>">
                

            </form>

            
        </div>

        <div class="checkout-right">
            <?php 
                $total=0;
                $finaltotal=0;
                $totalitems=0;
                foreach($_SESSION['cart'] as $key => $value)
                {
                    $total = $value['price'] * $value['quantity'];
                    $finaltotal += $value['price'] * $value['quantity'];
                    $totalitems += $value['quantity'];
                    ?>
                        <div class="product-item">
                            <div class="product-details">
                                <strong><?php echo $value['product_name'] ?></strong>
                                <small>x <?php echo $value['quantity'] ?></small>
                            </div>
                            <span>$  <?php echo $total ?></span>
                        </div>
                    <?php
                }
            ?>
            <form action="checkout.php" method="get">
                <div class="discount-code">
                                
                    <input type="text" name="donation" value="<?php if(isset($donation)){echo $donation;} ?>" placeholder="Enter Donation Amount (optional)">
                    <button type="submit" name="apply">Apply</button>
                </div>
            </form>
            <div class="subtotal">
                <span>Subtotal · <?php echo $totalitems?> items</span>
                <span>$<?php echo $finaltotal ?></span>
            </div>
            <div class="subtotal">
                <span>Donation</span>
                <span>$<?php if(isset($donation)){echo $donation;} ?></span>
            </div>
            <div class="total">
                <strong>Total</strong>
                <strong>USD $<?php if(isset($donation)){echo intval($donation)+$finaltotal;}
                                else{echo $finaltotal;} ?></strong>
            </div>
        </div>
    </div>


    
    <?php 
        // session_destroy(); 
    ?>
    <!-- -----BOOTSTRAP------ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>
</html>