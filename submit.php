<?php
    session_start();
    include('connection.php');
    require('config.php');
    // for the filling up of extra field in user table
    
    
    if (isset($_POST['placeorder'])) {
        $user_id = $_POST['user_id'];
        $phoneno = $_POST['phoneno'];
        $address = $_POST['address'];
        $postal_code = $_POST['postal_code'];
        $city = $_POST['city'];
    
        $datetime = date("Y-m-d H:i:s");
    
        // Update user info in database
        $updateQuery = "UPDATE user 
                        SET phoneno = '$phoneno', 
                            address = '$address', 
                            postal_code = '$postal_code', 
                            city = '$city', 
                            datetime = '$datetime' 
                        WHERE user_id = '$user_id'";
    
        $result = mysqli_query($conn, $updateQuery);
    
        if ($result) {
            // Save data to session before redirect
            $_SESSION['address'] = $address;
            $_SESSION['postal_code'] = $postal_code;
            $_SESSION['city'] = $city;
            $_SESSION['phoneno'] = $phoneno;

            echo "<script>
                alert('Details saved successfully!');
                window.location.href = 'submit.php?from=checkout';
            </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    // endd

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
    if(isset($_POST['placeorder']))
    {
        //random orderID
        function randomKey($limit)
        {
            $values = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
            $count = strlen($values);
            $count--;
            $key=NULL;
                for($x=1;$x<=$limit;$x++)
                {
                    $rand_var = rand(0,$count);
                    $key .= substr($values,$rand_var,1);
                }
            
            return strtolower($key);
        }
        $_SESSION['orderid']=randomKey(8);
        $orderid= $_SESSION['orderid'];

        $address=$_POST['address'];
        $postal_code=$_POST['postal_code'];
        $city=$_POST['city'];
        $phoneno = $_POST['phoneno']; // ✅ Correct
        $_SESSION['phoneno'] = $phoneno;  //Save it into the session if you want to use it later
        //$total=$_SESSION['finaltotal'];
        $donation = isset($_SESSION['donation']) ? intval($_SESSION['donation']) : 0;
        $total = $_SESSION['finaltotal'] + $donation;
        // $_SESSION['finaltotal'] = $total; optionally overwrite with the updated total

        
        $status='processing';
        $orderquery="INSERT INTO `orders`(`order_id`, `user_id`, `datetime`, `address`, `postal_code`, `city`, `total`, `status`) 
                                VALUES ('$orderid','$userid',current_timestamp(),'$address','$postal_code','$city','$total','$status')";
        $run_orderquery=mysqli_query($conn,$orderquery);

        foreach($_SESSION['cart'] as $key => $value)
        {
            $product_id=$value['product_id'];
            $orderdetailquery="INSERT INTO `order_details`(`order_id`, `product_id`) 
                                VALUES ('$orderid','$product_id')";
            $run_orderdetailquery=mysqli_query($conn, $orderdetailquery);
        }

        // moreeeeeeeee additionssss
        $_SESSION['order_success'] = $run_orderquery && $run_orderdetailquery;


        

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
    <link rel="stylesheet" href="aboutus.css">

    <!-- for search bar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php include('./navbar.php') ?>

    <div class="container" style="padding-top: 110px; background-color:#006d2c">
        <div class="row">
            <div class="col-lg-12 text-center mb-5 rounded">
                <h1 style="font-family: 'montserrat'; font-weight:bold; color:white">Order Summary</h1>
            </div>
        </div>
    </div>

    <div class="container py-3" style="background-color: rgba(56, 131, 171, 0.24); font-weight:bold;
    box-shadow:0 15px 35px 0 rgba(124, 175, 115, 0.4); width:fit-content; margin-top:10px; background-color:#ecfadc; border: 1px solid #006d2c">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 text-center">
                <div class="row">
                    <div class="col-6">
                        <p>Order ID</p>
                    </div>
                    <div class="col-6">
                        <p style="color: #306844"><?php echo $_SESSION['orderid'] ?? 'N/A'; ?></p>
                        <!-- <p style="color: #306844"><?php echo $orderid?></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Phone No.</p>
                    </div>
                    <div class="col-6">
                        <p style="color: #306844"><?php echo $_SESSION['phoneno'] ?? 'N/A'; ?></p>
                        <!-- <p style="color: #306844"><?php echo $_SESSION['phoneno']?></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Address</p>
                    </div>
                    <div class="col-6">
                        <p style="color: #306844"><?php echo $_SESSION['address'] ?? 'N/A'; ?></p>
                        <!-- <p style="color: #306844"><?php echo $address?></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>Postal Code</p>
                    </div>
                    <div class="col-6">
                        <p style="color: #306844"><?php echo $_SESSION['postal_code'] ?? 'N/A'; ?></p>
                        <!-- <p style="color: #306844"><?php echo $postal_code?></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p>City</p>
                    </div>
                    <div class="col-6">
                        <p style="color: #306844"><?php echo $_SESSION['city'] ?? 'N/A'; ?></p>
                        <!-- <p style="color: #306844"><?php echo $city?></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4 style="font-weight: bold;">Payment amount</h4>
                    </div>
                    <div class="col-6">
                        <h4 style="font-weight: bold; color: #306844">$ <?php echo $_SESSION['finaltotal'] ?></h4>
                    </div>
                </div>
                <?php 
                // if($run_orderquery && $run_orderdetailquery)
                // new changesssss
                if (isset($_SESSION['order_success']) && $_SESSION['order_success']) 
                {?>
                    <form action="pay.php" method="POST">

                    <!-- <button type="submit">Pay Now</button> -->
                    
                        <script 
                            src="https://checkout.stripe.com/checkout.js" 
                            class="stripe-button"
                            data-key="pk_test_51RNbXGRdy99MB75ksZA4FjQexqRtfAoCgrsKVAOZHLPBsnGiEaoBkUREJOL6FuuG1Sjmx4hf30mXYkthVth9P82p00ykAGJJRv"
                            data-amount="<?php echo ($_SESSION['finaltotal']*100)?>"
                            data-name="<?php echo "payment by". $_SESSION['phoneno']?>"
                            data-description=""
                            data-image=""
                            data-currency="usd"
                            >

                        </script>
                        <!-- <button type="submit" class="stripe-button-el" style="visibility: visible;">
                            <span style="display: block; min-height:30px">Pay With Card</span>
                        </button> -->

                        <!-- <script src="https://js.stripe.com/v3/"></script>
                        <form id="payment-form">
                        <input type="email" id="email" placeholder="Email" required />
                        <div id="card-element"></div>
                        <button type="submit">Pay</button>
                        </form>
                        <div id="error-message"></div>

                        <script>
                            const stripe = Stripe('pk_test_...'); // your publishable key
                            const elements = stripe.elements();
                            const card = elements.create('card');
                            card.mount('#card-element');

                            const form = document.getElementById('payment-form');
                            form.addEventListener('submit', async (e) => {
                                e.preventDefault();

                                const { token, error } = await stripe.createToken(card);
                                if (error) {
                                document.getElementById('error-message').textContent = error.message;
                                } else {
                                fetch('pay.php', {
                                    method: 'POST',
                                    headers: { 'Content-Type': 'application/json' },
                                    body: JSON.stringify({
                                    token: token.id,
                                    email: document.getElementById('email').value
                                    })
                                })
                                .then(response => response.json())
                                .then(result => {
                                    alert(result.message);
                                });
                                }
                            });
                        </script> -->

                        

                    
                    </form>

                    <?php
                    
                    
                }?>
                
            </div>

        </div>

    </div>

    <!-- -----BOOTSTRAP------ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 
</body>
</html>