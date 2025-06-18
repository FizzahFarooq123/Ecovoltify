<?php
    include('connection.php');
    session_start();
    if(!isset($_SESSION['adminusername']) ){
        echo"
            <script>
            alert('Admin must login first');
            window.location.href='adminlogin.php';
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
        background-color: #084236;
        color: white;
        transition: 0.4s;
        cursor: pointer;
        width: 11rem;
        height: 4.5rem;
        margin-bottom: 2px;
        font-weight: bold;
    }

    /* Add a light grey background on mouse-over */
    .btn:hover {
        background-color:   white;
        color: #084236;
        border: 1px solid #084236;
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
    /* .formcontent .mytable{
        display: flex;
        justify-content: center;
        align-items: center;
        padding-bottom: 3%;
        width: 100%;
    } */
    .formcontent .mytable th,td{
        padding: 15px 10px;
    }
    .formcontent .mytable th{
        background-color: #084236;
        color: white;
    }
    .del{
        width: 6rem;
        background-color: #084236;

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
                    View & Delete Products</h1>
                </div>
            </div>
        </div>

        <!-- ----VIEW & DEL PRODUCTS---- -->
        <div class="myfilter">
            <hr class="divider">
            <div id="myBtnContainer">
                <button class="btn" onclick="filterSelection('every')">All Products</button>
                <button class="btn" onclick="filterSelection('desc')">Power and Energy</button>
                <button class="btn" onclick="filterSelection('pc')">Modern Lighting</button>
                <button class="btn" onclick="filterSelection('generics')">Home Appliances</button>
                <!-- <button class="btn" onclick="filterSelection('indication')">Syrups & Suspension</button> -->
            </div>
            <div class="filtercontainer">
                <div class="filterDiv every">
                    <div class="formcontent">
                        <div class="mytable" style="overflow-x:auto;">
                            <table class="table table-bordered text-center border-secondary table-hover" 
                                style="background-color:  rgba(56, 131, 171, 0.16);
                                box-shadow: 0 15px 35px rgba(0,0,0,0.2);" >
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Brand ID</th>
                                    <th>Category ID</th>
                                    <th>Carbon Footprint</th>
                                    <th>Energy Efficiency</th>
                                    <th>Price</th>
                                    <!-- <th>Storage</th> -->
                                    <th>Quantity</th>
                                    <th>Delete</th>
                                </tr>
                                
                                
                                <?php
                                    $selectquery= "SELECT * FROM product";
                                    $query= mysqli_query($conn,$selectquery);
                                    while($result=mysqli_fetch_array($query)){
                                ?>
                                <tr> 
                                    <td><img style="width: 100px; height:100px;" src="<?php echo $result['prd_image'] ?>" alt=""></td>
                                    <td><?php echo $result['product_id'] ?></td>
                                    <td><?php echo $result['product_name'] ?></td>
                                    <td><?php echo $result['brand_id'] ?></td>
                                    <td><?php echo $result['category_id'] ?></td>
                                    <td><?php echo $result['carbon_footprint'] ?></td>
                                    <td><?php echo $result['energy_efficiency'] ?></td>
                                    <td><?php echo $result['price'] ?></td>
                                    <!-- <td><?php echo $result['storage'] ?></td> -->
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><a href="delete.php?delete=<?php echo $result['product_id'] ?>"><button class="btn del"><i style="font-size: 24px;" class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                                
                            </table>                  
                        </div>
                    </div>
                </div>
                <div class="filterDiv desc">
                    <div class="formcontent">
                        <div class="mytable" style="overflow-x:auto;">
                            <table class="table table-bordered text-center border-secondary table-hover" 
                                style="background-color:  rgba(56, 131, 171, 0.16);
                                box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Brand ID</th>
                                    <th>Category ID</th>
                                    <th>Carbon Footprint</th>
                                    <th>Energy Efficiency</th>
                                    <th>Price</th>
                                    <!-- <th>Storage</th> -->
                                    <th>Quantity</th>
                                    <th>Delete</th>
                                </tr>
                                
                                
                                <?php
                                    $selectquery= "SELECT * FROM product WHERE category_id=1";
                                    $query= mysqli_query($conn,$selectquery);
                                    while($result=mysqli_fetch_array($query)){
                                ?>
                                <tr> 
                                    <td><img style="width: 100px; height:100px;" src="<?php echo $result['prd_image'] ?>" alt=""></td>
                                    <td><?php echo $result['product_id'] ?></td>
                                    <td><?php echo $result['product_name'] ?></td>
                                    <td><?php echo $result['brand_id'] ?></td>
                                    <td><?php echo $result['category_id'] ?></td>
                                    <td><?php echo $result['carbon_footprint'] ?></td>
                                    <td><?php echo $result['energy_efficiency'] ?></td>
                                    <td><?php echo $result['price'] ?></td>
                                    <!-- <td><?php echo $result['storage'] ?></td> -->
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><a href="delete.php?delete=<?php echo $result['product_id'] ?>"><button class="btn del"><i style="font-size: 24px;" class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                                
                            </table>                  
                        </div>
                    </div>
                </div>
                <div class="filterDiv pc">
                    <div class="formcontent">
                        <div class="mytable" style="overflow-x:auto;">
                            <table class="table table-bordered text-center border-secondary table-hover" 
                                style="background-color:  rgba(56, 131, 171, 0.16);
                                box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Brand ID</th>
                                    <th>Category ID</th>
                                    <th>Carbon Footprint</th>
                                    <th>energy Efficiency</th>
                                    <th>Price</th>
                                    <!-- <th>Storage</th> -->
                                    <th>Quantity</th>
                                    <th>Delete</th>
                                </tr>
                                
                                
                                <?php
                                    $selectquery= "SELECT * FROM product WHERE category_id=2";
                                    $query= mysqli_query($conn,$selectquery);
                                    while($result=mysqli_fetch_array($query)){
                                ?>
                                <tr> 
                                    <td><img style="width: 100px; height:100px;" src="<?php echo $result['prd_image'] ?>" alt=""></td>
                                    <td><?php echo $result['product_id'] ?></td>
                                    <td><?php echo $result['product_name'] ?></td>
                                    <td><?php echo $result['brand_id'] ?></td>
                                    <td><?php echo $result['category_id'] ?></td>
                                    <td><?php echo $result['carbon_footprint'] ?></td>
                                    <td><?php echo $result['energy_efficiency'] ?></td>
                                    <td><?php echo $result['price'] ?></td>
                                    <!-- <td><?php echo $result['storage'] ?></td> -->
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><a href="delete.php?delete=<?php echo $result['product_id'] ?>"><button class="btn del"><i style="font-size: 24px;" class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                                
                            </table>                  
                        </div>
                    </div>
                </div>
                <div class="filterDiv generics">
                    <div class="formcontent">
                        <div class="mytable" style="overflow-x:auto;">
                            <table class="table table-bordered text-center border-secondary table-hover" 
                                style="background-color:  rgba(56, 131, 171, 0.16);
                                box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Brand ID</th>
                                    <th>Category ID</th>
                                    <th>Carbon Footprint</th>
                                    <th>Energy Efficiency</th>
                                    <th>Price</th>
                                    <!-- <th>Storage</th> -->
                                    <th>Quantity</th>
                                    <th>Delete</th>
                                </tr>
                                
                                
                                <?php
                                    $selectquery= "SELECT * FROM product WHERE category_id=3";
                                    $query= mysqli_query($conn,$selectquery);
                                    while($result=mysqli_fetch_array($query)){
                                ?>
                                <tr> 
                                    <td><img style="width: 100px; height:100px;" src="<?php echo $result['prd_image'] ?>" alt=""></td>
                                    <td><?php echo $result['product_id'] ?></td>
                                    <td><?php echo $result['product_name'] ?></td>
                                    <td><?php echo $result['brand_id'] ?></td>
                                    <td><?php echo $result['category_id'] ?></td>
                                    <td><?php echo $result['carbon_footprint'] ?></td>
                                    <td><?php echo $result['energy_efficiency'] ?></td>
                                    <td><?php echo $result['price'] ?></td>
                                    <!-- <td><?php echo $result['storage'] ?></td> -->
                                    <td><?php echo $result['quantity'] ?></td>
                                    <td><a href="delete.php?delete=<?php echo $result['product_id'] ?>"><button class="btn del"><i style="font-size: 24px;" class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                                
                            </table>                  
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>


    <!-- -----FILTER----- -->
    <script>
        //filterSelection("all")
        function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
        }

        // Show filtered elements
        function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
            }
        }
        }

        // Hide elements that are not selected
        function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
        }

        // Add active class to the current control button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
        }
    </script>

   <!-- -----BOOTSTRAP------ -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
 
</body>
</html>