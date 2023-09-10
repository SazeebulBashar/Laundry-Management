<?php
session_start();
session_unset();
session_destroy();

session_start();
if (isset($_SESSION['admin'])){
    header("Location: adminPage.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="./styles/login.css">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">

    <style>
        body{
            background-image:  url("./images/4.jpg");
            background-size:cover;
        }
    </style>
</head>
<body>
    
    <div class="container" style = "background-color: purple">
    <?php
        if (isset($_POST["login"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
            
            
            if ($password == 123 && $username == "bashar") {
                session_start();
                session_unset();
                session_destroy();
                session_start();
                $_SESSION["admin"] = "yes";
                header("Location: adminPage.php");
                
            }else{
                echo "<div class='alert alert-danger'>Password or username does not match</div>";
            }
        }
        
        
        ?>
       
      <form method="post">
        <div class="title">Admin Login</div>
        <div class="form-group">
            <input type="text" placeholder="username" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Password" name="password" id="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" id ="submit" class="btn">
        </div>
        
      </form>
     
    </div>
</body>
</html>