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
    if(isset($_POST['addproduct'])){
        $product_name= $_POST['product_name'];
        $file = $_FILES['prd_image'];
        $brand_id=$_POST['brand_id'];
        $category_id=$_POST['category_id'];
        $product_description=$_POST['product_description'];
        $carbon_footprint=$_POST['carbon_footprint'];
        $energy_efficiency=$_POST['energy_efficiency'];
        $price=$_POST['price'];
        $price2=$_POST['price2'];
        $warranty=$_POST['warranty'];
        $wattage=$_POST['wattage'];
        $voltage=$_POST['voltage'];
        // $dosage=$_POST['dosage'];
        // $storage=$_POST['storage'];
        $quantity=$_POST['quantity'];

        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];
        if($fileerror==0)
        {
            $destfile = 'upload/'.$filename;
            //echo "$destfile";
            move_uploaded_file($filepath,$destfile);
            $insertquery = "INSERT INTO `product`(`product_name`, `product_description`, `brand_id`, 
            `category_id`, `price`, `prd_image`, `carbon_footprint`, `energy_efficiency`, `quantity`, 
            `warranty`, `wattage`, `voltage`, `price2`) 
            VALUES ('$product_name','$product_description','$brand_id','$category_id',
            '$price','$destfile','$carbon_footprint','$energy_efficiency','$quantity','$warranty','$wattage',
            '$voltage','$price2')";

            mysqli_query($conn,$insertquery);
        }
        echo"
        <script>
            alert('Product added successfully');
            window.location.href='addproducts.php';
        </script>
        ";
    }
    // if(isset($_POST['addequipment'])){
    //     $product_name= $_POST['product_name'];
    //     $file = $_FILES['product_pic'];
    //     $brand_id=$_POST['brand_id'];
    //     $category_id=$_POST['category_id'];
    //     $description=$_POST['description'];
    //     $usedfor=$_POST['usedfor'];
    //     $price=$_POST['price'];
        
    //     $quantity=$_POST['quantity'];

    //     $filename = $file['name'];
    //     $filepath = $file['tmp_name'];
    //     $fileerror = $file['error'];
    //     if($fileerror==0)
    //     {
    //         $destfile = 'upload/'.$filename;
    //         //echo "$destfile";
    //         move_uploaded_file($filepath,$destfile);
    //         $insertquery = "INSERT INTO `product`(`product_name`, `product_pic`, `brand_id`, 
    //         `category_id`, `description`, `usedfor`, `price`,`quantity`) VALUES ('$product_name','$destfile',
    //         '$brand_id','$category_id','$description','$usedfor','$price','$quantity')";
    //         mysqli_query($conn,$insertquery);
    //     }
    //     echo"
    //     <script>
    //         alert('Product added successfully');
    //         window.location.href='addproducts.php';
    //     </script>
    //     ";
    // }



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
<style>
    *{
        font-family: 'Montserrat', sans-serif;
        scroll-behavior: smooth;
    }
    body{
        background-color: #ecfadc;
    }
    /* -----HEADER------ */
    

    /* The "show" class is added to the filtered elements */
    .filterDiv {
    display: none;
    }


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
        cursor: pointer;
        width: 11rem;
        height: 4.5rem;
        margin-bottom: 2px;
    }

    /* Add a light grey background on mouse-over */
    .btn:hover {
        background-color: white;
        color: #084236;
        border: 1px solid #084236;
    }

    /* Add a dark background to the active button */
    .btn.active {
        background-color: white;
        color: #084236;
        border: 1px solid #084236;
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
        padding: 15px 0px 15px 0px;
        
    }
    .formcontent .myform{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 3%;
        width: 50%;
        border-radius: 15px;
        background-color: #aedcae;
        box-shadow: 0 15px 35px rgba(0,0,0,0.4);
        font-weight: bold;
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
                <div class="col-lg-12 text-center" style="background-color:  #084236; padding:10px">
                    <h1 style="font-family: 'montserrat'; font-weight:bold; letter-spacing: 0.2rem; color: white">
                    Add Products</h1>
                </div>
            </div>
        </div>

        <!-- -----ADD PRODUCTS FORM----- -->
        <div class="myfilter">
            <hr class="divider">
            <div id="myBtnContainer" style="display: flex; flex-direction:row; flex-wrap:wrap; justify-content:center; gap: 2rem">
                <button class="btn" onclick="filterSelection('desc')">Power and Energy</button>
                <button class="btn" onclick="filterSelection('generics')">Modern Lighting</button>
                <button class="btn" onclick="filterSelection('pc')">Home Appliances</button>
                <!-- <button class="btn" onclick="filterSelection('indication')">Syrups & Suspension</button> -->
            </div>
            <div class="filtercontainer">
                <div class="filterDiv desc">
                    <div class="formcontent">
                        <div class="myform">
                            <form action="addproducts.php" method="POST" enctype="multipart/form-data">
                                <div class="row mb-2">
                                    <label for="product_name" class="col-6">Product Name</label>
                                    <input type="text" class="col-6" name="product_name">
                                </div>
                                <div class="row mb-2">
                                    <label for="prd_image" class="col-6">Product Image</label>
                                    <input type="file" class="col-6" name="prd_image">
                                </div>
                                <div class="row mb-2">
                                    <label for="brand_id" class="col-6">Brand ID</label>
                                    <select class="col-6" name="brand_id">
                                        <?php
                                            $query= "SELECT * FROM `brand`";
                                            $query2= mysqli_query($conn,$query);
                                            $count =1;
                                            while($result=mysqli_fetch_array($query2))
                                            {?>
                                                <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                                <?php $count = $count +1; ?>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <label for="category_id" class="col-6">Category ID</label>
                                    <input type="text" class="col-6" name="category_id" value="1">
                                </div>
                                <div class="row mb-2">
                                    <label for="product_description" class="col-6">Description</label>
                                    <textarea class="col-6" name="product_description"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <label for="carbon_footprint" class="col-6">Carbon Footprint</label>
                                    <input type="text" class="col-6" name="carbon_footprint">
                                </div>
                                <div class="row mb-2">
                                    <label for="energy_efficiency" class="col-6">Energy Efficiency</label>
                                    <input type="text" class="col-6" name="energy_efficiency">
                                </div>
                                <div class="row mb-2">
                                    <label for="price" class="col-6">Price Information</label>
                                    <input type="text" class="col-6" name="price" placeholder="example: $1500 per piece">
                                </div>
                                <div class="row mb-2">
                                    <label for="price2" class="col-6">Price Value</label>
                                    <input type="text" class="col-6" name="price2" placeholder="example: 1500.00">
                                </div>
                                <div class="row mb-2">
                                    <label for="warranty" class="col-6">Warranty</label>
                                    <input type="text" class="col-6" name="warranty">
                                </div>
                                <div class="row mb-2">
                                    <label for="wattage" class="col-6">Wattage</label>
                                    <input type="text" class="col-6" name="wattage">
                                </div>
                                <div class="row mb-2">
                                    <label for="voltage" class="col-6">Voltage</label>
                                    <input type="text" class="col-6" name="voltage">
                                </div>
                                <!-- <div class="row mb-2">
                                    <label for="dosage" class="col-6">Dosage</label>
                                    <textarea class="col-6" name="dosage"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <label for="storage" class="col-6">Storage</label>
                                    <input type="text" class="col-6" name="storage">
                                </div> -->
                                <div class="row mb-2">
                                    <label for="quantity" class="col-6">Quantity</label>
                                    <input type="text" class="col-6" name="quantity">
                                </div>


                                <button type="submit" name="addproduct" class="btn add">
                                    Add Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="filterDiv generics">
                    <div class="formcontent">
                        <div class="myform">
                            <form action="addproducts.php" method="POST" enctype="multipart/form-data">
                                <div class="row mb-2">
                                    <label for="product_name" class="col-6">Product Name</label>
                                    <input type="text" class="col-6" name="product_name">
                                </div>
                                <div class="row mb-2">
                                    <label for="prd_image" class="col-6">Product Image</label>
                                    <input type="file" class="col-6" name="prd_image">
                                </div>
                                <div class="row mb-2">
                                    <label for="brand_id" class="col-6">Brand ID</label>
                                    <select class="col-6" name="brand_id">
                                        <?php
                                            $query= "SELECT * FROM `brand`";
                                            $query2= mysqli_query($conn,$query);
                                            $count =1;
                                            while($result=mysqli_fetch_array($query2))
                                            {?>
                                                <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                                <?php $count = $count +1; ?>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <label for="category_id" class="col-6">Category ID</label>
                                    <input type="text" class="col-6" name="category_id" value="2">
                                </div>
                                <div class="row mb-2">
                                    <label for="product_description" class="col-6">Description</label>
                                    <textarea class="col-6" name="product_description"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <label for="carbon_footprint" class="col-6">Carbon Footprint</label>
                                    <input type="text" class="col-6" name="carbon_footprint">
                                </div>
                                <div class="row mb-2">
                                    <label for="energy_efficiency" class="col-6">Energy Efficiency</label>
                                    <input type="text" class="col-6" name="energy_efficiency">
                                </div>
                                <div class="row mb-2">
                                    <label for="price" class="col-6">Price Information</label>
                                    <input type="text" class="col-6" name="price" placeholder="example: $1500 per piece">
                                </div>
                                <div class="row mb-2">
                                    <label for="price2" class="col-6">Price Value</label>
                                    <input type="text" class="col-6" name="price2" placeholder="example: 1500.00">
                                </div>
                                <div class="row mb-2">
                                    <label for="warranty" class="col-6">Warranty</label>
                                    <input type="text" class="col-6" name="warranty">
                                </div>
                                <div class="row mb-2">
                                    <label for="wattage" class="col-6">Wattage</label>
                                    <input type="text" class="col-6" name="wattage">
                                </div>
                                <div class="row mb-2">
                                    <label for="voltage" class="col-6">Voltage</label>
                                    <input type="text" class="col-6" name="voltage">
                                </div>
                                <!-- <div class="row mb-2">
                                    <label for="dosage" class="col-6">Dosage</label>
                                    <textarea class="col-6" name="dosage"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <label for="storage" class="col-6">Storage</label>
                                    <input type="text" class="col-6" name="storage">
                                </div> -->
                                <div class="row mb-2">
                                    <label for="quantity" class="col-6">Quantity</label>
                                    <input type="text" class="col-6" name="quantity">
                                </div>


                                <button type="submit" name="addproduct" class="btn add">
                                    Add Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="filterDiv pc">
                    <div class="formcontent">
                        <div class="myform">
                            <form action="addproducts.php" method="POST" enctype="multipart/form-data">
                                <div class="row mb-2">
                                    <label for="product_name" class="col-6">Product Name</label>
                                    <input type="text" class="col-6" name="product_name">
                                </div>
                                <div class="row mb-2">
                                    <label for="prd_image" class="col-6">Product Image</label>
                                    <input type="file" class="col-6" name="prd_image">
                                </div>
                                <div class="row mb-2">
                                    <label for="brand_id" class="col-6">Brand ID</label>
                                    <select class="col-6" name="brand_id">
                                        <?php
                                            $query= "SELECT * FROM `brand`";
                                            $query2= mysqli_query($conn,$query);
                                            $count =1;
                                            while($result=mysqli_fetch_array($query2))
                                            {?>
                                                <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                                <?php $count = $count +1; ?>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <label for="category_id" class="col-6">Category ID</label>
                                    <input type="text" class="col-6" name="category_id" value="3">
                                </div>
                                <div class="row mb-2">
                                    <label for="product_description" class="col-6">Description</label>
                                    <textarea class="col-6" name="product_description"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <label for="carbon_footprint" class="col-6">Carbon Footprint</label>
                                    <input type="text" class="col-6" name="carbon_footprint">
                                </div>
                                <div class="row mb-2">
                                    <label for="energy_efficiency" class="col-6">Energy Efficiency</label>
                                    <input type="text" class="col-6" name="energy_efficiency">
                                </div>
                                <div class="row mb-2">
                                    <label for="price" class="col-6">Price Information</label>
                                    <input type="text" class="col-6" name="price" placeholder="example: $1500 per piece">
                                </div>
                                <div class="row mb-2">
                                    <label for="price2" class="col-6">Price Value</label>
                                    <input type="text" class="col-6" name="price2" placeholder="example: 1500.00">
                                </div>
                                <div class="row mb-2">
                                    <label for="warranty" class="col-6">Warranty</label>
                                    <input type="text" class="col-6" name="warranty">
                                </div>
                                <div class="row mb-2">
                                    <label for="wattage" class="col-6">Wattage</label>
                                    <input type="text" class="col-6" name="wattage">
                                </div>
                                <div class="row mb-2">
                                    <label for="voltage" class="col-6">Voltage</label>
                                    <input type="text" class="col-6" name="voltage">
                                </div>
                                <!-- <div class="row mb-2">
                                    <label for="dosage" class="col-6">Dosage</label>
                                    <textarea class="col-6" name="dosage"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <label for="storage" class="col-6">Storage</label>
                                    <input type="text" class="col-6" name="storage">
                                </div> -->
                                <div class="row mb-2">
                                    <label for="quantity" class="col-6">Quantity</label>
                                    <input type="text" class="col-6" name="quantity">
                                </div>


                                <button type="submit" name="addproduct" class="btn add">
                                    Add Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="filterDiv indication">
                    <div class="formcontent">
                        <div class="myform">
                            <form action="addproducts.php" method="POST" enctype="multipart/form-data">
                                <div class="row mb-2">
                                    <label for="product_name" class="col-6">Product Name</label>
                                    <input type="text" class="col-6" name="product_name">
                                </div>
                                <div class="row mb-2">
                                    <label for="product_pic" class="col-6">Product Image</label>
                                    <input type="file" class="col-6" name="product_pic">
                                </div>
                                <div class="row mb-2">
                                    <label for="brand_id" class="col-6">Brand ID</label>
                                    <select class="col-6" name="brand_id">
                                        <?php
                                            $query= "SELECT * FROM `brand`";
                                            $query2= mysqli_query($conn,$query);
                                            $count =1;
                                            while($result=mysqli_fetch_array($query2))
                                            {?>
                                                <option value="<?php echo $count; ?>"><?php echo $count; ?></option>
                                                <?php $count = $count +1; ?>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <label for="category_id" class="col-6">Category ID</label>
                                    <input type="text" class="col-6" name="category_id" value="4">
                                </div>
                                <div class="row mb-2">
                                    <label for="description" class="col-6">Description</label>
                                    <textarea class="col-6" name="description"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <label for="generics" class="col-6">Generics</label>
                                    <input type="text" class="col-6" name="generics">
                                </div>
                                <div class="row mb-2">
                                    <label for="usedfor" class="col-6">Used for</label>
                                    <input type="text" class="col-6" name="usedfor">
                                </div>
                                <div class="row mb-2">
                                    <label for="price" class="col-6">Price</label>
                                    <input type="text" class="col-6" name="price">
                                </div>
                                <div class="row mb-2">
                                    <label for="indication" class="col-6">Indication</label>
                                    <input type="text" class="col-6" name="indication">
                                </div>
                                <div class="row mb-2">
                                    <label for="sideeffects" class="col-6">Side Effects</label>
                                    <input type="text" class="col-6" name="sideeffects">
                                </div>
                                <div class="row mb-2">
                                    <label for="when_not_to_use" class="col-6">When not to use</label>
                                    <input type="text" class="col-6" name="when_not_to_use">
                                </div>
                                <div class="row mb-2">
                                    <label for="dosage" class="col-6">Dosage</label>
                                    <textarea class="col-6" name="dosage"></textarea>
                                </div>
                                <div class="row mb-2">
                                    <label for="storage" class="col-6">Storage</label>
                                    <input type="text" class="col-6" name="storage">
                                </div>
                                <div class="row mb-2">
                                    <label for="quantity" class="col-6">Quantity</label>
                                    <input type="text" class="col-6" name="quantity">
                                </div>


                                <button type="submit" name="addproduct" class="btn add">
                                    Add Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div> -->
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