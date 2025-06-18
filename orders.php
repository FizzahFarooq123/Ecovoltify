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
    if(isset($_POST['update']))
    {
        $status=$_POST['status'];
        $orderid=$_POST['order_id'];
        $update_query="UPDATE `orders` SET `status`='$status' WHERE order_id='$orderid'";
        $run_update_query=mysqli_query($conn,$update_query);
        if($run_update_query)
        {
            echo"
            <div style='display: flex; justify-content:center;'>
                <div style='width: 60%;' class='alert alert-success' role='alert'>
                    <div style='display: flex; justify-content: center; align-items: center;'>
                    <svg style='width:50px; height:50px' class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                        Order Status updated succcessfully! <a href='orders.php' class='alert-link'>
                        OK</a>.
                    </div>
                </div>
            </div>
            ";
        }
    }
    if(isset($_POST['delete']))
    {
        $orderid=$_POST['order_id'];
        $delete_query="DELETE FROM `orders` WHERE  order_id='$orderid'";
        $run_delete_query=mysqli_query($conn,$delete_query);
        if($run_delete_query)
        {
            echo"
            <div style='display: flex; justify-content:center;'>
                <div style='width: 60%;' class='alert alert-success' role='alert'>
                    <div style='display: flex; justify-content: center; align-items: center;'>
                    <svg style='width:50px; height:50px' class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
                        Order deleted succcessfully! <a href='orders.php' class='alert-link'>
                        OK</a>.
                    </div>
                </div>
            </div>
                
            ";
        }
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
    .btn{
        border: 1px solid #084236;
        color: #084236;
        transition: 0.4s;
    }
    .btn:hover{
        background-color: #084236;
        color: white;
    }
    
</style>
<body>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>

    <!-- -----HEADER----- -->
    <section class="header">
        <!-- ------NAVBAR------ -->
        <?php
            include("./admin_navbar.php");
        ?>

        <!-- -----HEAD----- -->
        <div class="container" style="padding-top: 110px;">
            <div class="row">
                <div class="col-lg-12 text-center mb-5" style="background-color:  #084236;">
                    <h1 style="font-family: 'montserrat'; font-weight:bold; letter-spacing: 0.2rem; color:white">
                    Orders</h1>
                </div>
            </div>
        </div>

        <div class="allusers">
            <div class="users">
                <table class="table table-hover text-center table-bordered border-secondary" 
                style="background-color:  rgba(56, 131, 171, 0.16); box-shadow: 0 15px 35px rgba(0,0,0,0.2);" >
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date & Time</th>
                                <th colspan="2">Placed by</th>
                                <th colspan="3">Shipping Address</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                    
                <?php 
                    $query="SELECT * FROM `orders`";
                    $result = mysqli_query($conn,$query);
                    while($result2=mysqli_fetch_array($result))
                    {?>
                        <tr>
                            <form action="orders.php" method="POST">
                                <td><?php echo $result2['order_id'] ?></td>
                                <input type="hidden" name="order_id" value="<?php echo $result2['order_id'] ?>">
                                <td><?php echo $result2['datetime'] ?></td>
                                <td><?php echo $result2['user_id'] ?></td>
                                <?php 
                                    // $_SESSION['order_id']=$result2['order_id'];
                                    $userid = $result2['user_id'];
                                    $userquery= "SELECT `name` from `user` where user_id='$userid'";
                                    $run_userquery=mysqli_query($conn,$userquery);
                                    $result3=mysqli_fetch_array($run_userquery);
                                ?>
                                <td><?php echo $result3['name'] ?></td>
                                <td><?php echo $result2['address'] ?></td>
                                <td><?php echo $result2['postal_code'] ?></td>
                                <td><?php echo $result2['city'] ?></td>
                                <td><?php echo $result2['total'] ?></td>
                                <td>
                                    <select class="form-select" name="status">
                                        <option selected><?php echo $result2['status']?></option>
                                        <option >processing</option>
                                        <option >cancelled</option>
                                        <option >dispatched</option>
                                        <option >shipped</option>
                                    </select>
                                </td>
                                <td><input type="submit" class="btn" name="update" value="Update" ></td>
                                <td><input type="submit" class="btn" name="delete" value="Delete" ></td>
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