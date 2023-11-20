<?php

if (isset($_GET['oid'])){
    $oid = $_GET['oid'];
    $sid = $_GET['sid'];
    $uid = $_GET['uid'];
    $qty = $_GET['qty'];

    require_once("dbconnection.php");
    $sql_checking = "SELECT * FROM completed_orders WHERE order_id = '$oid'";
           $result = mysqli_query($conn, $sql_checking);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
           }
           else{
            $sql_in = "insert into completed_orders values('$oid','$sid','$uid','$qty');";
            mysqli_query($conn,$sql_in);
            $sql_delete_from_runnning ="DELETE FROM running_orders WHERE order_id = '$oid';";
            mysqli_query($conn,$sql_delete_from_runnning);
            
           }
    

   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/navbar.css">
    <link rel="icon" type="image/x-icon" href="./images/favicon.png">
    <link rel="stylesheet" href="./styles/adminPage.css">
    <title>Admin Page</title>
</head>
<body>

<!-- --------------------------------------------Running Order section --------------------------------------------  -->
    <div class="container">
        <div class="text-center">
            <h1>Welcome Bashar</h1>
        </div>
        <h3>These are the running orders</h3>

        <?php
        require_once("dbconnection.php");
        $sql= "SELECT * FROM (running_orders INNER JOIN users on running_orders.user_id = users.id) INNER JOIN services ON service_id = services.s_id order by order_id desc;";
        $result = mysqli_query($conn, $sql);

        echo "<table class='table table-striped '>
        <thead class='thead-dark'>
          <tr>
            <th scope='col'>Order ID</th>
            <th scope='col'>Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Address</th>
            <th scope='col'>Service Name</th>
            <th scope='col'>Price</th>
            <th scope='col'>Quantity</th>
            <th scope='col'>Total</th>
            <th scope='col'>Action</th>
          </tr>
        </thead>
        <tbody>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['order_id']."</td>";
            echo "<td>".$row['full_name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>"."$". $row['price']."</td>";
            echo "<td>".$row['qty']."</td>";
            echo "<td>"."$".$row['qty'] * $row['price'] ."</td>";
            echo "<td>".  "<button class='complete_btn'>" . "<a href='adminPage.php?oid=" . $row['order_id'] . "&sid=" . $row['service_id']. "&uid=". $row['user_id'] . "&qty=". $row['qty'] ."'". ">Mark as Complete</button>" ."</td>";
            echo "</tr>";
        }
          
        echo "</tbody>
                </table>";

      
?>


    </div>

    <!-- ------------------------------------------Completed Order Section--------------------------------------------------------->

    <div class="container">
        <div class="text-center">
            <h1>Total Completed Orders</h1>
        </div>
       
        <?php
        require_once("dbconnection.php");
        $sql= "SELECT * FROM (completed_orders INNER JOIN users on completed_orders.user_id = users.id) INNER JOIN services ON service_id = services.s_id order by order_id;";
        $result = mysqli_query($conn, $sql);

        echo "<table class='table table-striped '>
        <thead class='thead-dark'>
          <tr>
            <th scope='col'>Order ID</th>
            <th scope='col'>Name</th>
            <th scope='col'>Email</th>
            <th scope='col'>Address</th>
            <th scope='col'>Service Name</th>
            <th scope='col'>Total Price</th>
            
          </tr>
        </thead>
        <tbody>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['order_id']."</td>";
            echo "<td>".$row['full_name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>"."$".$row['qty'] * $row['price'] ."</td>";
            echo "</tr>";
        }
          
        echo "</tbody>
                </table>";

        mysqli_close($conn);
?>


    </div>

    <div  class="text-center">
        <button class="complete_btn home">
            <a href="index.php">Back Home</a>
        </button>
    </div>
</body>
</html>