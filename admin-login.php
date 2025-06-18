<?php
    include "connection.php";
    if(isset($_POST['login']))
    {
        $adminname=$_POST["admin_name"];
        $password=$_POST["password"];
        $query= "SELECT * FROM `admin` WHERE admin_name ='$adminname' AND password='$password'";
        $result = mysqli_query($conn, $query);
        $name=mysqli_fetch_array($result);
        $num = mysqli_num_rows($result);
        if($num ==1)
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['adminusername']=$adminname;
            header('location: adminwelcome.php');
        }
    }
    //session_destroy();
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
    *{
    margin: 0;
    scroll-behavior: smooth;
    font-family: "Montserrat", sans-serif;
    }

    .logo img{
        height: 70px;
        width: 200px;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        z-index: 1;
    }

    .nav-item:hover .dropdown-menu {
        display: block;
    }

    .nav-account-link{
        display: block;
        background-color:white; 
        border: 2px solid #509046;
        color: #509046 !important; 
        transition: 0.3s ease; 
        text-decoration: none;
    }
    .nav-account-link:hover{
        color: black !important;
        background-color: #509046;
        text-decoration: none;
    }

    .dropdown-menu a+a{
        background-color: white;
        color: black;
        border: 1px solid #509046;
    }

    .dropdown-menu{
        background-color: white;
        border: 1px solid #509046;
        /* color: #006d2c; */
    }

    .dropdown-menu .dropdown-item{
        color: #509046;
        font-size: medium;
        font-weight: bold;
        /* display: flex;
        justify-content: center; */
        /* align-items: center; */
    }

    .dropdown-menu li:hover {
        background-color: #f4fcda;
    }

    .dropdown-menu li:hover .dropdown-item{
        background-color: inherit;
    }

    /* not working */
    .dropdown-divider{
        height: 0;
        margin: var(--bs-dropdown-divider-margin-y);
        overflow: hidden;
        border-top: 1px solid var(--bs-dropdown-divider-bg) !important;
        opacity: 1;
    }
    /* not working */

    .nav-item a{
        font-weight:bold;
        font-size:medium;
        color: black;
        transition: 0.3s ease;
        font-family: "Poppins", sans-serif;
    }

    .nav-item a:hover {
        box-shadow:0 3px 0 0 black;
        color: #509046;
    }
    .nav-item a.active {
        box-shadow: 0 3px 0 0 black;
    }

    .nav-products-link{
        display: block;
        background-color:white; 
        /* border: 2px solid #509046; */
        color: #509046; 
        transition: 0.3s ease; 
        text-decoration: none;
    }

    @media(min-width:992px){
        .navbar-expand-lg .nabar-nav{
            flex-direction: row;
        }
    }

    .cart{
        height: 55px;
        width: 55px;
        background-color: transparent;
        border: none;
        transition: 0.3s ease;
    }

    .cart:hover{
        background-color: #f4fcda;
        
    }

    /* navbar ended */

    /* for form */
    :root {
        --gradient-percent: 0%;
    }

    body {
        background: white;
        padding-bottom: 5%;
        background-image: url(images/loginbg.png);
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .myform {
        background-color: #e0f7a2;
        opacity: 0.8;
        width: 40%;
        height: 620px;
        display: flex;
        font-weight: bold;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-top: 3%;
        border-radius: 10%;
        border: 5px solid  #3c5201;
        box-shadow: 0 4px 8px rgba(0,0,0,1);
    }
    .a {
        width: 90%;
        height: 40px;
        margin-bottom: 5px;
        border-radius: 6px;
    }
    #loginform{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
    }
    #indicator{
        width: 100px;
        border: none;
        background: #e0f7a2;
        height: 3px;
        margin-top: 5px;
        margin-left: 19px;
        transform: translateX(100px);
    }
    .button{
        display: block;
        width: 200px;
        margin: 40px auto;
        padding: 10px 20px;
        text-align: center;
        background-color: #3c5201;
        color: white;
        text-decoration: none;
        font-size: 1.2em;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }
    .button:hover{
        background-color:  #91af40;
    }
    
    @media screen and (max-width:900px) {
        .myform{
            width: 80%;
            opacity: 0.9;
        }
    }
    @media screen and (max-width:401px) {
        .myform{
            opacity: 0.9;
        }
        #loginform input{
            width: 77%;
        }
    }
</style>

<body>
<!--for navbar section-->
    <?php
        include("./admin_navbar.php");
    ?>
<!-- navbar ended -->




    <?php
        // if($loginalert)
        // {
        //     echo'<p id="showalert" style="background-color : #e4fccc;">You are logged in.</p>';
        // }
        // if($loginerror)
        // {
        //     echo'<p id="showalert" style="background-color : #fb6767;">Incorrect credentials.</p>';
        // }
    ?> 
    <div class="myform" style="margin-top: 150px;">        
        <div class="formcontent" data-sr-id="0" style="visibility: visible; opacity: 1; transition: all, opacity 2.5s cubic-bezier(0.5, 0, 0, 1) 0.3s;">
            <h1 style="text-align:center;">WELCOME ADMIN !</h1>
            <h3 style="text-align:center;">Login below to explore more</h3>
            <!-- <p style="text-align: center;">Login as Admin</p> -->
            <form id="loginform" action="admin-login.php" method="post">
            
                <p style="margin-block-end: 0em; margin-top:50px">Admin Username</p>
                <input class="a" for="admin_name" type="text" name="admin_name" placeholder="John Doe"  required="" fdprocessedid="685c5r">


                <p style="margin-block-end: 0em;">Password</p>
                <input class="a" for="password" type="password" name="password" placeholder="Enter Password" required="" fdprocessedid="l8c5ka">
           
                <input name="login" class="button" type="submit" value="Login" fdprocessedid="tvezp" style="color: white;"><br>
                <!-- <p>Don't have an account? <a href="">Sign up</a></p> -->
                <p><a href="homepage.php">Click here </a> to return to home page.</p>
            </form>
        </div>
    </div>


    

    <script>
        ScrollReveal({
                reset:true,
                distance: '60px',
                duration: 2500,
                delay: 300
            });
        ScrollReveal().reveal('.formcontent',{delay:300, distance: '0px',opacity: 0});
    </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>