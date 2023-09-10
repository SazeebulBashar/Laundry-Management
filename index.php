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
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="services.php">Services</a>
                        <a class="nav-link" href="#">Pricing</a>
                        <a class="nav-link" href="#">About</a>


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

    <!-- ---------------------------------------------------------carousel---------------------------------------------------- -->

    <div class="container caro">
        <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/carousel/carousel-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>The Best Service in the Town.</h1>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/carousel/carousel-2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Get The Fastest Delivery Service Experience</h1>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./images/carousel/carousel-3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Even Better Washing and Cleaning Technique</h1>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>