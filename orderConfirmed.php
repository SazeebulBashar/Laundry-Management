<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
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
    <link rel="stylesheet" href="./styles/orderConfirmed.css">
    <title>Laundry MAMA</title>
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">
</head>

<body>

<!-------------------------------------------------navbar------------------------------------------------------>
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
                           echo "<a href='logout.php' class='btn btn-warning'> Logout </a>";
                   
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


    <!-------------------------------------------------------------Order confirmed with  messege----------------------------------->

    <div class="container d-flex justify-content-center">
        <div class="order-box text-center">
            <h2>Congratulations! Your order has been Placed!</h2>
            <div class="details-box d-flex justify-content-between">
                <hr id="hr">
                </div>
            <div class="details-box d-flex justify-content-between">
                <h5>Customer Name</h5>
                <h5>Email</h5>
                <h5>Address</h5>
            </div>
            <div class="details-box d-flex justify-content-between">
                <hr id="hr">  
                </div>

            <div class="details-box d-flex justify-content-between">
                <h5><?php echo $_SESSION['name']; ?></h5>
                <h5><?php echo $_SESSION['email']; ?></h5>
                <h5><?php echo $_SESSION['address']; ?></h5>
            </div>

            <div class="details-box d-flex justify-content-between">
                <hr id="hr">
                </div>

                <div class="details-box d-flex">
                <h5>Soon Our men will contact you and bring your clothes. Then your clothes will be sent to the above given address soon.</h5>
                </div>


        </div>
    </div>


    <?php
    require_once "dbconnection.php";
    $email = $_SESSION['email'];
    $sqlforuser ="SELECT * FROM users WHERE email = '$email'; ";

    $result = mysqli_query($conn,$sqlforuser);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
    $service_id = $_GET['s_id'];

    $sql = "INSERT INTO running_orders (service_id, user_id) VALUES ('$service_id' , '$user_id'); ";

    mysqli_query($conn,$sql);

    $conn->close();


    ?>


</body>

</html>