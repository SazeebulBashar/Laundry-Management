<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">

    <style>
        body{
            background-image:  url("./images/3.jpg");
            background-size:cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "dbconnection.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    // session_start();
                    $_SESSION["user"] = "yes";
                    $_SESSION["name"] = $user["full_name"];
                    $_SESSION["email"] = $user["email"];
                    $_SESSION["address"] = $user["address"];
                    if (isset($_SESSION["url"])){
                    header("Location: " . $_SESSION['url']);
                    }
                    else{
                        header("Location: index.php");
                    }
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="title">Login</div>
        <div class="form-group">
            <input type="email" placeholder="Email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn">
        </div>
        <div style="margin-top: 10px"><p>Not registered yet? <a href="registration.php">Register Here</a></p></div>
      </form>
     
    </div>
</body>
</html>