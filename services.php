<?php
session_start();
$_SESSION["url"] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/card.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="stylesheet" href="./styles/services.css">
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">
</head>

<body>
    <!-- -------------------------------------- Nav Section ------------------------------------------- -->
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



    <!-- ------------------------------------------- Service Section -------------------------------------------------- -->

    <h1 class="text-center service-tag">Get The best Laundry Services in the Town.</h1>
    <div class="container d-flex justify-content-center">
        <div class="extra">
        <div class='row row-cols-1 row-cols-md-2 g-4 '>

            <?php
require_once "dbconnection.php";

$sql = "SELECT * FROM services";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) {
    
    echo "<div class='col'>
        <div class='card h-70'>
            <img src='./images/Quick_wash.jpg' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title text-center'>" .$row['title']. "</h5>
                <p class='card-text'>" .$row['description']. "</p>
                <div class='text-center'>
                    <h4 class='price'>$" .$row['price']. "</h4>
                <button class='card-btn btn-primary'><a href='orderPage.php?id=". $row['s_id'] . "'". ">Book Now</a> </button>
                </div>
            </div>
        </div>
    </div>
";

}


$conn->close();

?>
            </div>
        </div>
    </div>

</body>

</html>