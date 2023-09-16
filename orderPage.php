<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php?pageName=services.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/orderPage.css">
    <link rel="stylesheet" href="./styles/navbar.css">
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">
    <title>Order Page</title>
</head>

<body>
    <!-- --------------------------------------------navbar------------------------------------- -->

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

    <!-- --------------------------------------------Cart Section------------------------------------- -->
    <?php
require_once "dbconnection.php";
$id = $_GET['id'];

$sql = "SELECT * FROM services WHERE s_id = '$id';";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
mysqli_close($conn);

?>
    <div class="container">
        <h1>Welcome to Order Page</h1>
    </div>

    <!-- -----------------------------------------------------cart---------------------------------------------->


    <div class="cart_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Service Details</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img
                                            src="./images/services/<?php echo $row['img_url']; ?>" alt="">
                                    </div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Service Name</div>
                                            <div class="cart_item_text" id='name'><?php echo $row['title']; ?></div>
                                        </div>

                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <!-- <div class="cart_item_text" id='qty'>1</div> -->
                                            <div class="cart_item_text">
                                            <form method="post" action="">
                                                <input name="quantity" type="number" value="1" min="1" id='qty' onchange="run()">
                                            </form>
                                            </div>
                                            
                                            
                                        </div>

                                        <div class="cart_item_price cart_info_col align-items-center">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text"><span
                                                    id='price'><?php echo $row['price']; ?></span></div>
                                        </div>

                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text" id='totalPrice'></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right float-end">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount" id='orderTotal'></div>
                            </div>
                        </div>
                        <?php
                         if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $qty = $_POST["quantity"];
                         }
                        ?>
                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_checkout" id="place-order">
                                <a href='orderConfirmed.php?s_id=<?php echo $id. "&qty=". $qty; ?>'>Place Order</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- ------------------------------------------------------JS--------------------------------------------->

    <script>
        const price = document.getElementById("price").innerHTML;
        const qty = document.getElementById("qty").value;
        const totalPrice = price * qty;
        document.getElementById("totalPrice").innerHTML = "$" + totalPrice;
        document.getElementById("orderTotal").innerHTML = "$" + totalPrice;

    function run(){
        console.log("Running");
        const price = document.getElementById("price").innerHTML;
        const qty = document.getElementById("qty").value;
        const totalPrice = price * qty;
        document.getElementById("totalPrice").innerHTML = "$" + totalPrice;
        document.getElementById("orderTotal").innerHTML = "$" + totalPrice;
        }
    </script>
</body>

</html>