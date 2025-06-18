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
    /*  */

    /* ---ADD PRODUCTS FORM--- */
    .formcontent{
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    .formcontent .mytable{
        display: flex;
        justify-content: center;
        align-items: center;
        padding-bottom: 3%;
        width: 80%;
    }
    .formcontent .mytable th,td{
        padding: 15px 10px;
    }
    .formcontent .mytable th{
        background-color: #084236;
        color: white;
    }
    .del{
        width: 6rem;
        background-color: #ddd;
    }
    .del:hover{
        background-color: #084236;
        color: white;
    }
    @media screen and (max-width:700px) {
        .formcontent .myform{
            width: 85%;
        }
        .formcontent .myform div label{
            font-size: 0.8rem;
        }
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
        <div class="container" style="padding-top: 110px;">
            <div class="row">
                <div class="col-lg-12 text-center" style="background-color:  #084236;">
                    <h1 style="font-family: 'montserrat'; font-weight:bold; letter-spacing: 0.2rem; color:white">
                    View Brands
                    </h1>
                </div>
            </div>
        </div>

        <!-- ----VIEW & DEL PRODUCTS---- -->
        <div class="myfilter">
            <hr class="divider">
                <div class="formcontent">
                    <div class="mytable" style="overflow-x:auto;">
                        <table class="table table-bordered text-center border-secondary table-hover" 
                        style="background-color:  rgba(56, 131, 171, 0.16);
                                box-shadow: 0 15px 35px rgba(0,0,0,0.2);" >
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <!-- <th>Image</th> -->
                            </tr>
                            
                            
                            <?php
                                $selectquery= "SELECT * FROM brand";
                                $query= mysqli_query($conn,$selectquery);
                                while($result=mysqli_fetch_array($query)){
                            ?>
                            <tr> 
                                <!-- <td><img style="width: 100px; height:100px;" src="<?php echo $result['brand_pic'] ?>" alt=""></td> -->
                                <td><?php echo $result['brand_id'] ?></td>
                                <td><?php echo $result['brand_name'] ?></td>
                            </tr>
                            <?php 
                                }
                            ?>
                            
                        </table>                  
                    </div>
                </div>
        </div>
                
                    
        
    </section>


    
   <!-- -----BOOTSTRAP------ -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>