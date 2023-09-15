<?php
session_start();
if (!isset($_SESSION["user"])) {
//    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="stylesheet" href="./styles/about.css">
    
    <title>Happy Laundry</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">
</head>

<body>
    <!-- ----------------------------------------------------navbar-------------------------------------------------- -->
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-container">
            <div class="container-fluid">
                <div class="div">
                    <a class="navbar-brand" href="index.php"><img id="logo" src="./images/logo.jpg"
                            alt="Happy Laundry"><a href="index.php" id="logo-title">Happy Laundry</a></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="services.php">Services</a>
                        <a class="nav-link" href="about.php">About</a>


                        <?php
                        if (isset($_SESSION["user"])) {
                           echo "<a href='logout.php' class='login-logout nav-link'> Logout </a>";
                   
                           echo  "<button type='button' class='btn btn-primary position-relative icon round'>"
                           . strtoupper($_SESSION["name"][0]) . strtoupper($_SESSION["name"][-1]) . "<span class='position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle'>
                             <span class='visually-hidden'>New alerts</span>
                           </span></button>" ; 

                        }
                        else{
                            echo "<a class='nav-link' href='registration.php'>Register</a>";
                            echo "<a href='login.php' class='login-logout nav-link'>Login</a>";
                        }
                          ?>

                        <a class="nav-link admin" href="adminLogin.php">Admin Login</a>


                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- ---------------------------------------------------------About Section---------------------------------------------------- -->

    <div class="container about-container">
    <div class="about-section">
            <h1 class="text-center">About Us</h1>
            <p>Welcome to Your Laundry Service!</p>
            <p>At Your Laundry Service, we are dedicated to providing top-notch laundry solutions to our customers. With years of experience in the industry, we have become a trusted name in the world of laundry services.</p>
            <p>Our Mission:</p>
            <ul>
                <li>Deliver clean and fresh laundry on time, every time.</li>
                <li>Offer competitive pricing and convenient pickup/delivery options.</li>
                <li>Prioritize customer satisfaction and convenience above all else.</li>
            </ul>
            <p>Why Choose Us:</p>
            <ul>
                <li>Experienced and professional staff.</li>
                <li>State-of-the-art laundry facilities.</li>
                <li>Eco-friendly and efficient laundry practices.</li>
                <li>Convenient online booking and tracking.</li>
            </ul>
            <p>We value your trust and look forward to serving you with the best laundry services in town.</p>
            
            <!-- Embed Google Map -->
            <div class="google-map text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.406207228904!2d90.42089117284662!3d23.76854524093341!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7892dcf0001%3A0x853ad729be4edc71!2sEast%20West%20University!5e0!3m2!1sen!2sbd!4v1694709236194!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="quote text-center">
                "Laundry is our passion, and customer satisfaction is our goal."
            </div>
        </div>
        <div class="divider"></div>
    </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>