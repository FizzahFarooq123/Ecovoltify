<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/leaf.png" />
    <title>EcoVoltify-About Us</title>
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
    <link rel="stylesheet" href="aboutus.css">

</head>

<body>
<!--for navbar section-->
    <?php
        include("./navbar.php");
    ?>
<!-- navbar ended -->
    <header>
        <div class="about-header">
            <h1 style="font: weight 1500px; font-size:50px; margin-top: 96px;">About Us</h1>
            <h6>"Welcome to EcoVoltify — where eco-conscious living begins.
                We offer smart, sustainable appliances designed to reduce your carbon footprint
                and inspire mindful choices that support a cleaner, greener future for all."</h6>
            <p>Discover what makes us unique.</p>
        </div>
    </header>
    <div class="about-container">
        <section class="mission">
            <h2 class="about-headings">Our Mission</h2>
            <div class="about-content">
                <img src="images/mission.jpeg" alt="Mission Image">
                <div>
                    <p style="text-align: justify;">At <i>EcoVoltify</i>, Our mission is to make sustainable living the standard, not the exception. Through our platform, we aim to provide individuals and families with access to high-quality, eco-friendly appliances that reduce energy consumption and support a healthier environment. We believe in empowering our customers to make informed choices that align with their values. A portion of every purchase made on our platform directly contributes to our tree-planting program, which helps offset carbon emissions and restore natural ecosystems. Our goal is not only to reduce environmental harm but to actively reverse it by reinvesting in nature. With every product we offer and every tree we plant, we are taking another step toward a more sustainable and resilient future.
                </div>
            </div>
        </section>
        <section class="team">
            <h2 class="about-headings">Our Team</h2>
            <div class="about-content">
                <div>
                    <p style="text-align: justify;">Out team at <i>EcoVoltify</i>, We are a team of forward-thinking individuals who believe in the power of technology and conscious living to reshape the future of our planet. Our team includes passionate environmentalists, skilled engineers, product specialists, and digital strategists, all working together to create a meaningful impact through sustainable commerce. Each member brings a unique perspective and deep commitment to the cause of environmental responsibility. From curating innovative eco-friendly appliances to optimizing customer experience and handling logistics, our collaborative approach ensures that every step of the process reflects our dedication to a greener world. More than just colleagues, we are united by a shared vision—to lead a purpose-driven business that prioritizes both people and the planet.
                    </p>
                </div>
                <img src="images/team.jpeg" alt="Team Image">
            </div>
        </section>
        <section class="values">
            <h2 class="about-headings">Our Values</h2>
            <div class="about-content">
                <img src="images/values.jpeg" alt="Values Image">
                <div>
                    <p style="text-align: justify;">At the core of our business are values that reflect our commitment to sustainability, integrity, and community impact. We are driven by the belief that businesses have a responsibility to contribute positively to the world. Transparency is central to how we operate—we carefully vet our product suppliers, emphasize ethical sourcing, and provide clear information about the environmental benefits of each item. Our promise to our customers goes beyond just selling appliances; we are here to build a movement. One that encourages conscious consumption, rewards green choices, and fosters long-term partnerships based on trust. Every tree we plant and every appliance we deliver reflects our deeper purpose: to create a world where economic growth and environmental responsibility go hand in hand.


                    </p>
                </div>
            </div>
        </section>
        <a href="homepage.php" class="back-to-home">Back to Home</a>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>