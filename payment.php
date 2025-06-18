<?php
    include('connection.php');
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
        font-family: 'Montserrat', sans-serif;
        scroll-behavior: smooth;
    }
    body{
        background-color: #ecfadc;
    }
    /* -----HEADER------ */
    
    .allusers{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
</style>
<body>
    <!-- -----HEADER----- -->
    <section class="header">
        <!-- ------NAVBAR------ -->
        <?php
            include("./admin_navbar.php");
        ?>

        <!-- -----HEAD----- -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5" style="background-color:  rgba(56, 131, 171, 0.24);">
                    <h1 style="font-family: 'Dancing Script', cursive; font-weight:bold; letter-spacing: 0.2rem;">
                    Payments / Transactions</h1>
                </div>
            </div>
        </div>

        <div class="allusers">
            <div class="users">
                <table class="table table-hover text-center table-bordered border-secondary"
                style="background-color:  rgba(56, 131, 171, 0.16); box-shadow: 0 15px 35px rgba(0,0,0,0.2);" >
                            <tr>
                                <th class="text-center">Payment ID</th>
                                <th class="text-center">Order ID</th>
                                <th class="text-center">User ID</th>
                                <th class="text-center">Card ID</th>
                            </tr>
                    
                <?php 
                    $query="SELECT * FROM `payment`";
                    $result = mysqli_query($conn,$query);
                    while($result2=mysqli_fetch_array($result))
                    {?>
                        <tr>
                            <form action="payment.php" method="POST">
                                <td class="text-center"><?php echo $result2['payment_id'] ?></td>
                                <td class="text-center"><?php echo $result2['order_id'] ?></td>
                                <td class="text-center"><?php echo $result2['userid'] ?></td>
                                <td class="text-center"><?php echo $result2['card_id'] ?></td>
                            </form>
                        </tr>
                    <?php 
                    }
                ?>
                </table>
            </div>
            
        </div>
    </section>

   <!-- -----BOOTSTRAP------ -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 
</body>
</html>