<?php
include 'connection.php';
session_start();
if (isset($_POST['submit'])) {
    if (isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $testimonial = $_POST['testimonial'];
        $insert_query = "INSERT INTO `testimonial`(`name`, `email`, `testimonial`, `user_id`) VALUES ('$name','$email','$testimonial','$userid')";
        $insert_result = mysqli_query($conn, $insert_query);
        if ($insert_result) {
            echo "
                <script>
                    alert(' Thank You for your testimonial! ');
                    window.location.href='homepage.php';
                </script>
                ";
        }
    }
    else{
        echo "
                <script>
                    alert(' You must Login first to submit a testimonial! ');
                    window.location.href='user-login.php';
                </script>
                ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/leaf.png" />
    <title>Customer Testimonial</title>
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


        /* for testmonials work */
        .testimonial-form-container {
            font-family: "Poppins", sans-serif;
            background: url(images/testimonial_img.png) no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 92vh;
            /* margin: 0; */
            color: #fff;
            padding: 20px;
        }

        /* Styling the testimonial form */
        .testimonial-form {
            background-color: white;
            padding: 50px;
            max-width: 700px;
            text-align: center;
            opacity: 0.9;
            border: 3px solid  #3bb77e;
            box-shadow: 0 4px 8px rgba(0,0,0,1);

            /* background-color: #e0f7a2;
            opacity: 0.8;
            width: 40%;
            height: 580px;
            display: flex;
            font-weight: bold;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 3%;
            border-radius: 10%;
            border: 5px solid  #3c5201;
            box-shadow: 0 4px 8px rgba(0,0,0,1); */
        }

        /* Heading of the testimonial form */
        .testimonial-form-title {
            margin-bottom: 5%;
            text-align: center;
            font-size: 45px;
            color: #084236;
            font-weight: bold;
        }

        /* Label styling */
        .testimonial-form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bolder;
            font-size: 25px;
            color: #000000;
        }

        /* Input and textarea styling */
        .testimonial-form input,
        .testimonial-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 24px;
            background: #80c8aa;
            opacity: 0.8;
            color: black;
            box-sizing: border-box;
        }

        /* Input and textarea focus styling */
        .testimonial-form input:focus,
        .testimonial-form textarea:focus {
            outline: 4px solid #80c8aa;
            background: rgba(255, 255, 255, 0.9);
        }

        /* Button styling */
        .testimonial-form button {
            font-family: "Poppins", sans-serif;
            background-color: #3bb77e;
            opacity: 0.8;
            border: none;
            color: white;
            text-decoration: none;
            font-family: fangsong;
            padding: 10px 28px;
            font-size: 23px;
            width: 200px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-weight: bolder;
            transition: 0.5s ease;
        }

        /* Button hover effect */
        .testimonial-form button:hover {
            box-shadow: 0 40px 60px rgba(228, 217, 217, 0.5);
            background-color: rgb(10, 8, 8);
            color: #ffffff;
        }

        .testimonial-form button:active {
            transform: scale(0.98);
        }

        /* Message styling */
        .testimonial-form-message {
            margin-top: 20px;
            text-align: center;
            font-size: 16px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .testimonial-form {
                padding: 20px;
            }

            .testimonial-form-title {
                font-size: 40px;
            }

            .testimonial-form input,
            .testimonial-form textarea {
                padding: 10px;
            }

            .testimonial-form button {
                padding: 10px;
            }
        }

        /* for footer section */
        footer {
            background-color: #f4fcda;
            padding-top: 30px;
        }

        .footercontainer {
            width: 100%;
        }

        .footernav {
            text-align: center;
        }

        .footernav .footernavlist a {
            color: black;
            margin: 20px;
            text-decoration: none;
            font-size: 1.3em;
            font-weight: bold;
            opacity: 0.7;
            transition: 0.5s ease;
        }

        .footernav .footernavlist a:hover {
            opacity: 1;
            color: #538353;
        }

        .footerbottom {
            padding-top: 40px !important;
            padding: 20px;
            text-align: center;
        }

        .footerbottom p {
            color: black;
            font-weight: bold;
        }

        .Designer {
            opacity: 0.7;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin: 0px 5px;
        }
    </style>
</head>

<body>
    <!--for navbar section-->
    <?php
        include("./navbar.php");
    ?>

    <!-- for testmonial work -->
    <div class="testimonial-form-container" style="margin-top: 96px;">
        <?php
            if(isset($_SESSION['userid'])){
                $useriddd=$_SESSION['userid'];
                $user_query = "SELECT * FROM `user` WHERE user_id = $useriddd";
                $user_result = mysqli_query($conn,$user_query);
                $user_row =mysqli_fetch_array($user_result);
            }
        ?>
        <form action="usertestimonial.php" method="post" id="testimonial-form" class="testimonial-form">
            <h1 class="testimonial-form-title">Customer Testimonial</h1>
            <label for="name" style="font-weight: 500;">Name</label>
            <input type="text" class="name" placeholder="Enter your name" id="name" name="name" 
                    value="<?php if(isset($_SESSION['userid'])){echo $user_row['name'];} ?>" required>

            <label for="email" style="font-weight: 500;">Email (ex:john_doe123@xyz.com)</label>
            <input type="email" class="email" placeholder="Ex: john_doe123@xyz.com" id="email" name="email" 
                    value="<?php if(isset($_SESSION['userid'])){echo $user_row['email'];} ?>" required>

            <label for="testimonial" style="font-weight: 500;">Testimonial</label>
            <textarea id="testimonial" class="testimonial" placeholder="enter your opinion" name="testimonial" rows="5" required></textarea>

            <button type="submit" value="submit" name="submit" style="font-family:'Poppins', sans-serif ; font-weight: 500;">Submit</button>
            <div id="message" class="btn"></div>
        </form>
    </div>
    


    <!-- for footer section -->
    <footer>
        <div class="footernav" >
            <div class="footernavlist" style="padding-top: 25px;">
                <a href="homepage.php">Home</a>
                <a href="about us.php">About</a>
                <a href="homepage.php #category">Categories</a>
                <a href="homepage.php #testimonial">Testimonials</a>
                <a href="homepage.php #contact">Contact</a>
            </div>
        </div>
        <div class="footerbottom">
            <p>Copyright &copy;2024; Glow Guide.<span class="Designer">All rights reserved.</span></p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>