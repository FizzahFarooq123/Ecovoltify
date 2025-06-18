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
    if(isset($_POST['addbrand'])){
        $brand_name= $_POST['brand_name'];
        $brand_description = $_POST['brand_description'];

        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];
        if($fileerror==0)
        {
            // $destfile = 'upload/'.$filename;
            // move_uploaded_file($filepath,$destfile);

            // $insertquery = "INSERT INTO `brand`(`brand_name`) VALUES ('$brand_name')";
            // mysqli_query($conn,$insertquery);
            // $insertquery = "INSERT INTO `brand`(`brand_description`) VALUES ('$brand_description')";
            // mysqli_query($conn,$insertquery);
            $insertquery = "INSERT INTO `brand`(`brand_name`, `brand_description`) VALUES ('$brand_name', '$brand_description')";
            mysqli_query($conn, $insertquery);
        }
        echo"
        <script>
            alert('Brand added successfully');
            window.location.href='addbrands.php';
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
    
    /* -----FILTER----- */
    .myfilter{
        text-align: center;
    }
    .filtercontainer{
        display: flex;
        justify-content: center;
        overflow: hidden;
    }
    .container {
        overflow: hidden;
    }

    .filterDiv {
        color: black;
        width: 90%;
        line-height: 1.5;
        text-align: center;
        margin-top: 2%;
        display: none /* Hidden by default */
    }

    /* The "show" class is added to the filtered elements */
    .show {
        display: block;
    }

    /* Style the buttons */
    .btn {
        border: none;
        outline: none;
        padding: 12px 16px;
        border: 1px solid #084236;
        color: #084236;
        transition: 0.4s;
        cursor: pointer;
        width: 11rem;
        height: 4.5rem;
        margin-bottom: 2px;
    }

    /* Add a light grey background on mouse-over */
    .btn:hover {
        background-color: #3bb77e;
        color: white;
    }

    /* Add a dark background to the active button */
    .btn.active {
        background-color: #666;
        color: white;
    }
    @media screen and (max-width:485px) {
        .btn{
            font-size: 0.7rem;
            width: 5.5rem;
        }
        .filterDiv p{
            font-size: 0.7rem;
        }
    } 


    /* ---ADD PRODUCTS FORM--- */
    .formcontent{
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    .formcontent .myform{
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 2%;
        padding-bottom: 3%;
        width: 50%;
        border-radius: 15px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.4);
    }
    .formcontent .myform form{
        width: 100%;
    }
    .formcontent .myform div{
        width: 100%;
    }
    .formcontent .myform div input{
        border-radius: 9px;
        height: 35px;
    }
    .formcontent .myform div select{
        border-radius: 9px;
        height: 35px;
    }
    .formcontent .myform div textarea{
        border-radius: 9px;
    }
    .add{
        width: 90%;
        height: 45px;
        
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
                    Add Brands
                    </h1>
                </div>
            </div>
        </div>

        <!-- -----ADD PRODUCTS FORM----- -->
        <div class="myfilter">
            <hr class="divider">
            <div class="formcontent" >
                <div class="myform" style="background-color:  #ecfadc;
        box-shadow: 0 15px 35px 0 rgba(124, 175, 115, 0.4);">
                    <form action="addbrands.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <label for="brand_name" class="col-6">Brand Name</label>
                            <input type="text" class="col-6" name="brand_name">
                        </div>
                        <div class="row mb-2">
                            <label for="brand_description" class="col-6">Brand Description</label>
                            <input type="text" class="col-6" name="brand_description">
                        </div>
                        <!-- <div class="row mb-2">
                            <label for="brand_pic" class="col-6">Brand Logo</label>
                            <input type="file" class="col-6" name="brand_pic">
                        </div> -->
                        

                        <button type="submit" name="addbrand" class="btn add">
                            Add Brand
                        </button>
                    </form>
                </div>
            </div>
        </div>
             

        
    </div>
              
    </section>
    

   <!-- -----BOOTSTRAP------ -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 
</body>
</html>