<?php
session_start();
include("../php/dbconnect.php");

if (isset($_POST['id'])) {
    $orderid = $_POST['id'];
    $query = "UPDATE orderhistory SET orderStatus = 'cancel' WHERE orderID = $orderid;";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>
    alert('Order Cancelled');
    window.location.href='./userorderdetail.php?id=" . $orderid . "';
    </script>";
    }
}