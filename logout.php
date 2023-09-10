<?php
session_start();
if (isset($_SESSION["url"])){
    $loc =$_SESSION['url'];
    }
session_unset();
session_destroy();
header("Location: " . $loc);
?>