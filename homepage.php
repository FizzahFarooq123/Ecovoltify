<?php
include 'connection.php';
// include 'contact.php'
session_start();
// if(!isset($_SESSION['email'])){
//       header('location: login.php');
//   }
if (isset($_POST['submit'])) {
  $username=$_POST['username'];
  $useremail=$_POST['useremail'];
  $message=$_POST['message'];
  $insert_query = "INSERT INTO `contact_form`(`username`, `useremail`, `message`) VALUES ('$username','$useremail','$message')";
  $insert_result=mysqli_query($conn,$insert_query);
  if($insert_result){
    echo "
    <script>
        alert(' Your form has been submitted successfully! ');
        window.location.href='homepage.php';
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
<!--for navbar section-->
    <?php
        include("./navbar.php");
    ?>
<!-- navbar ended -->

    <div class="homeimg">
        <div class="welcome">
            <h1 style="color: #3c5201; font-size: 50px; text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.3); font-family: 'Montserrat', sans-serif;">Welcome To EcoVoltify</h1>
            <h6 style="color: black; font-size: 20px; text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.3); font-family: 'Montserrat', sans-serif;">Where Eco-Conscious Living Meets Timeless Technology.</h6>
            <div class="Aboutbtn" style="margin-top: 7px;">
                <a style="text-decoration: none;" href="aboutus.php" class="About-button">About Us</a>
            </div>
            <!-- <button class="About-btn">About Us</button> -->
        </div>

         <!-- for search bar -->
        <div class="container" style="padding-top: 65px;">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <form action="search.php" method="GET" class="search-container">
                        <input type="text" name="query" class="form-control search-input" placeholder="Search Products..." required>
                        <button type="submit" class="search-icon" style="background: none; border: none;">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end -->
    </div>

    <!-- for categories part -->
    <div class="for-bg-color" style="background-color: #f4fcda;" id="category">
        <div class="pt-5 homepg-products" id="category" style="display: flex; flex-direction: column; justify-content: center; align-items: center; ">
            <h1 style="color: #3c5201; font-weight: bold; text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.3);">SHOP BY CATEGORY</h1>
        
            <div class="category">
                <div class="card maincard" style="width: 24rem;height: 21rem;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body power-and-energy">
                    <h4 class="card-title" style="color: white; font-weight: bolder; display: flex;justify-content: center;">Power & Energy</h4>
                    <!-- <img src="images/makeup-category.jfif" style="height: 280px; width:235px;" class="card-img-top" alt="..."> -->
                    <a href="power-and-energy.php" class="product-button anybtn" id="redirectButton">View Products</a>
                    <!-- <a href="#" class="product-button anybtn" id="redirectButton">About us</a> -->
                </div>
                </div>

                <div class="card maincard" style="width: 24rem;height: 21rem;">
                <div class="card-body modern-lighting">
                    <h4 class="card-title" style="color: white; font-weight: bolder; display: flex;justify-content: center;">Modern Lighting</h4>
                    <!-- <img src="images/skincare-category2.jfif" style="height: 280px; width:235px;" class="card-img-top" alt="..."> -->
                    <a href="modern-lighting.php" class="product-button anybtn" id="redirectButton">View Products</a>
                </div>
                </div>

                <div class="card maincard" style="width: 24rem;height: 21rem;">
                <div class="card-body home-appliances">
                    <h4 class="card-title" style="color: white; font-weight: bolder; display: flex;justify-content: center;">Home Appliances</h4>
                    <!-- <img src="images/skincare-category2.jfif" style="height: 280px; width:235px;" class="card-img-top" alt="..."> -->
                    <a href="home-appliances.php" class="product-button anybtn" id="redirectButton">View Products</a>
                </div>
                </div>

            </div>
        </div>
    </div>  


<!-- trees counter -->
    <div class="for-bg-color" style="background-color: #f4fcda; padding-top: 60px !important">
        <div class="fourth_section" style="display: flex; justify-content: center; align-items: center; gap: 3rem;background-color: #f4fcda;">
            <div class="fourth_section_content" style="width: 450px; height: 440px;">
                <h1 style="font-weight: bold; font-size: 40px; color: black;">Hundreds of Trees Planted From Your Donations</h1>
                    <p style="color: #808291; text-align: left; font-size: 20px;">
                        Thanks to your generous donations, we’ve planted hundreds of trees, saved up to 99% energy, and cut carbon emissions by 50%. With thousands of active users and amazing feedback, we’re making a real difference together.
                    </p>
            </div>
            <div class="fourth_section_box stats">
                <div class="portion1">
                    <h2 style="color: #0a442c;"><span style="color: #0a442c; font-size: 50px; font-weight: 600;" data-count="700">0</span>+</h2>
                    <p style="color: #509046;">Trees Planted</p>
                </div>
                <div class="portion2">
                    <h2 style="color: #0a442c;"><span style="color: #0a442c; font-size: 50px; font-weight: 600;" data-count="97">0</span>%</h2>
                    <p style="color: #509046;">Energy Savings</p>
                </div>
                <div class="portion3">
                    <h2 style="color: #0a442c;"><span style="color: #0a442c; font-size: 50px; font-weight: 600;" data-count="50">0</span>%</h2>
                    <p style="color: #509046;">Carbon Footprint Reduction</p>
                </div>
                <div class="portion4">
                    <h2 style="color: #0a442c;"><span style="color: #0a442c; font-size: 50px; font-weight: 600;" data-count="1000">0</span>+</h2>
                    <p style="color: #509046;">Positive Feedback</p>
                </div>
            </div>
        </div>
    </div>
    

<!-- for blogs section -->
    <div class="for-bg-color" style="background-color: #f4fcda;padding-top: 70px; " id="blogs">
        <div class="blogs">
            <h1 style="text-align: center;color: #3c5201; font-weight: bold; text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.3);">Blogs</h1>
            <div class="blog-container" style="padding-top: 20px;">
                <!-- 1st blog -->
                <div class="blog-card">
                    <a href="blog-pages.html?blog=1"><img src="blogImages/blog1.jpg" alt="Energy-saving gadgets"></a>
                    <div class="blog-content">
                    <a href="blog-pages.html?blog=1">
                        <div class="blog-title">Small Devices, Big Impact: How Energy-Saving Gadgets Reduce Carbon Emissions</div>
                    </a>
                    <div class="blog-snippet">Discover how compact tech innovations are making a huge difference in reducing our carbon footprint...</div>
                    <a class="read-more" href="blog-pages.html?blog=1">Read more</a>
                    </div>
                </div>

                <!-- 2nd blog -->
                <div class="blog-card">
                    <a href="blog-pages.html?blog=2"><img src="blogImages/blog2.jpg" alt="Carbon tracking"></a>
                    <div class="blog-content">
                    <a href="blog-pages.html?blog=2">
                        <div class="blog-title">What Is Carbon Tracking and Why Should You Care?</div>
                    </a>
                    <div class="blog-snippet">Learn how carbon tracking works and why it’s essential for making more sustainable choices...</div>
                    <a class="read-more" href="blog-pages.html?blog=2">Read more</a>
                    </div>
                </div>

                <!-- 3rd blog -->
                <div class="blog-card">
                    <a href="blog-pages.html?blog=3"><img src="blogImages/blog3.jpg" alt="Energy-efficient products"></a>
                    <div class="blog-content">
                    <a href="blog-pages.html?blog=3">
                        <div class="blog-title">Can Buying Energy-Efficient Products Really Help the Planet?</div>
                    </a>
                    <div class="blog-snippet">We explore whether your eco-friendly purchases are really as impactful as they seem...</div>
                    <a class="read-more" href="blog-pages.html?blog=3">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- -----TESTIMONIALS----- -->
    <div class="testimonial" id="testimonial">
        <!-- ------SECTION-5------ -->
        <div id="section-5" class="context">
            <div style="text-align: center; padding:30px 0px 30px 0px;">
                <h1 style="color: #3c5201; font-weight: bold; text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.3);">TESTIMONIALS</h1>
            </div>
        </div>
        <!-- -----SECTION-6----- -->
        <section class="section-6">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                        $testi_query = 'SELECT * FROM testimonial';
                        $testi_result = mysqli_query($conn, $testi_query);
                        // query ko execute karaye ga 
            
                        // sab kuch result main jo aya hai usse array ki form main store karaye ga
                        // echo 'executed';
                        while ($testi_row = mysqli_fetch_array($testi_result)) {
                    ?>

                        <div class="swiper-slide">
                            <div class="testimonialBox">
                            <img class="quote" src="images/quote-right.png" />
                            <div class="test-content">
                                <p style="margin-top: 85px; color: white">
                                "<?php echo $testi_row['testimonial']?>"
                                </p>
                                <p style="color: black;"><?php echo $testi_row['name']?></p>
                            </div>
                            </div>
                        </div>
                    <?php
                        } 
                    ?>
                    
                    <!-- <div class="swiper-slide">
                        <div class="testimonialBox">
                        <img class="quote" src="images/quote-right.png" />
                        <div class="test-content">
                            <p style="margin-top: 85px; color: white">
                            "Finding international  brands has never been
                            easier! This site connects me directly to official sources
                            for authentic products."
                            </p>
                            <p style="color: black;">HAMNAH ADNAN</p>
                        </div>
                        </div>
                    </div> -->
                    <!-- <div class="swiper-slide">
                        <div class="testimonialBox">
                        <img class="quote" src="images/quote-right.png" />
                        <div class="test-content">
                            <p style="margin-top: 85px; color: black">
                            "I love how this site simplifies my search for . It's like having a  store in one
                            click!"
                            </p>
                            <p>MARIAM ARSHAD</p>
                        </div>
                        </div>
                    </div> -->
                    <!-- <div class="swiper-slide">
                        <div class="testimonialBox">
                        <img class="quote" src="images/quote-right.png" />
                        <div class="test-content">
                            <p style="margin-top: 85px; color: black">
                            "Finding the perfect balance of ss has
                            given me the conf"
                            </p>
                            <p>FIZZAH FAROOQ</p>
                        </div>
                        </div>
                    </div> -->
                    <!-- <div class="swiper-slide">
                        <div class="testimonialBox">
                        <img class="quote" src="images/quote-right.png" />
                        <div class="test-content">
                            <p style="margin-top: 85px; color: black">
                            "The products are 100% original. Highly recommend"
                            </p>
                            <p>DIYA FATIMA</p>
                        </div>
                        </div>
                    </div> -->
                    <!-- <div class="swiper-slide">
                        <div class="testimonialBox">
                        <img class="quote" src="images/quote-right.png" />
                        <div class="test-content">
                            <p style="margin-top: 85px; color: black">
                            "This website exclusively features reliable skincare
                            brands, ensuring I always get top-quality products that
                            deliver results."
                            </p>
                            <p>LAIBA EMAAN</p>
                        </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="testimonial-intake" id="testimonial-intake">
                <p>You can share your opinon here!</p>
                <a href="usertestimonial.php" class="Write-testimonial" id="redirectButton">Write Testimonial</a>
            </div>
            
        </section>
    </div>

    <!-- contact sec -->
    <div class="contact-sec">
        <div class="inner">
        <div class="maincontactsec" id="contact">
            <div class="contactheading" style="display:flex; justify-content: center;padding-top: 20px; font-size: x-large;">
            <h1 style="color:#00441b;">Contact<span style="color:#006d2c"> Us</span></h1>
            </div>
        </div>
        <div class="contactsec">
            <div class="infosec" style="margin-top: 42px;">
            <div class="address">
                <!-- <div><img width="40" height="40" src="images/icon.png" alt="region-code"/></div> -->
                <div><img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/place-marker--v1.png" alt="place-marker--v1"/></div>
                <h1 style="color:#00441b; font-size:large;">Address</h1>
                <p style="color: white;font-weight: normal;">Karachi, Pakistan</p>
            </div>
            <div class="phone">
                <div><img width="50" height="50" src="https://img.icons8.com/ios-filled/50/FFFFFF/phone.png" alt="phone"/></div>
                <h1 style="color:#00441b;font-size:large;">Phone</h1>
                <p style="color: white;font-weight: normal;">+92-123456780-9</p>
            </div>
            <div class="email">
                <div><img width="50" height="50" src="https://img.icons8.com/ios-glyphs/30/FFFFFF/secured-letter--v1.png" alt="secured-letter--v1"/></div>
                <h1 style="color:#00441b;font-size:large;">Email</h1>
                <p style="color: white;font-weight: normal;">EcoVoltify@gmail.com</p>
            </div>
            </div>
            <div class="msgsec">
            <div class="msgmytext">
                <h1 style="color:white;font-size:x-large;">Send us a message</h1>
                <p style="color: #00441b; font-size: large; font-weight: bold;padding-top: 10px;">Have a question in mind? Feel
                free to reach out! We're just a message away and eager to connect.</p>
            </div>

            <div class="inputboxes">
                <form action="homepage.php" method="POST">
                <div class="box1"><input type="text" name="username" placeholder="Enter your name" required></div>
                <div class="box2"><input type="email" name="useremail" placeholder="Enter your email" required></div>
                <div class="box3"><textarea name="message" placeholder="Enter your message" id="" rows="5" required></textarea></div>
                <div class="submitbutton">
                    <input name="submit" style="background-color: #00441b;color: white" type="submit" value="Submit" class="btn">
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>

<!-- for footer section -->
    <footer>
        <div class="footernav">
            <div class="footernavlist">
                <a href="#home">Home</a>
                <a href="about us.php">About</a>
                <a href="#category">Categories</a>
                <a href="#testimonial">Testimonials</a>
                <a href="#contact">Contact</a>
            </div>
        </div>
        <div class="footerbottom">
            <p>Copyright &copy;2025; EcoVoltify.<span class="Designer">All rights reserved.</span></p>
        </div>
    </footer>

   






<!-- for counter section javascript -->
<script src="homepage.js"></script>


<!-- chat bot -->
<script>
    (function(){
    if(!window.chatbase || window.chatbase("getState") !== "initialized"){
        window.chatbase = (...arguments) => {
        if(!window.chatbase.q) window.chatbase.q = [];
        window.chatbase.q.push(arguments);
        };
        window.chatbase = new Proxy(window.chatbase, {
        get(target, prop){
            if(prop === "q") return target.q;
            return (...args) => target(prop, ...args);
        }
        });
    }

    const onLoad = function(){
        const script = document.createElement("script");
        script.src = "https://www.chatbase.co/embed.min.js";
        script.id = "-IMpun7v5zbGqBY6Z4zrA"; // This is your bot's ID
        script.domain = "www.chatbase.co";
        document.body.appendChild(script);
    };

    if(document.readyState === "complete") onLoad();
    else window.addEventListener("load", onLoad);
    })();
</script>

<script>
    window.addEventListener('load', function () {
    fetch('chatbase_identity.php')
        .then(res => res.json())
        .then(data => {
        if (data.userId && data.userHash) {
            window.chatbase('setIdentity', {
            userId: data.userId,
            userHash: data.userHash
            });
        }
        });
    });
</script>

<!-- for testimonials swiping action -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".swiper-container", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 100,
            modifier: 2,
            slideShadows: true,
        },
        loop: true,
        });

    </script>


<!-- -----SCROLL ANIMATIONS---- -->
    <script>
        

        ScrollReveal({
                reset:true,
                distance: '60px',
                duration: 2500,
                delay: 300
            });
        ScrollReveal().reveal('.welcome h1',{delay:300, origin:'top'});

        ScrollReveal({
                reset:true,
                distance: '60px',
                duration: 2500,
                delay: 300
            });
        ScrollReveal().reveal('.welcome h6',{delay:300, origin:'top'});

        ScrollReveal({
                reset:true,
                distance: '60px',
                duration: 2500,
                delay: 300
            });
        ScrollReveal().reveal('.Aboutbtn',{delay:300, origin:'bottom'});

        ScrollReveal({
                reset:true,
                distance: '80px',
                duration: 2500,
                delay: 300
            });
        ScrollReveal().reveal('.homepg-products',{delay:400, origin:'left'});

        ScrollReveal({
                reset:true,
                distance: '80px',
                duration: 2500,
                delay: 400
            });
        ScrollReveal().reveal('.blogs',{delay:400, origin:'left'});

        ScrollReveal({
                reset:true,
                distance: '-60px',
                duration: 2500,
                delay: 300
            });
        ScrollReveal().reveal('.fourth_section',{delay:300, distance: '0px',opacity: 0});

        ScrollReveal({
                reset:true,
                distance: '-60px',
                duration: 2500,
                delay: 300
            });
        ScrollReveal().reveal('.swiper-container',{delay:300, distance: '0px',opacity: 0});

        // ScrollReveal({
        //         reset:true,
        //         distance: '60px',
        //         duration: 2500,
        //         delay: 400
        //     });
        // ScrollReveal().reveal('.section-7',{delay:400, origin:'bottom'});
    </script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>