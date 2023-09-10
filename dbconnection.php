<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "test";

$conn = mysqli_connect($servername,$username,$pass,$dbname);

if (!$conn){
    die ("Not Connected." . mysqli_connect_error());
}

else
    // echo "<h1>Connected Successfully...</h1>";

// mysqli_close();

?>