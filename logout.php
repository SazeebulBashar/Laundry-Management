<?php
session_start();
$loc="";
if (isset($_SESSION["url"])){
    $loc =$_SESSION['url'];
    }
session_unset();
session_destroy();
header("Location: " . $loc);
?>