<?php session_start();
include("dbconnect.php");
include_once("../templates/top.php");

if (isset($_GET['id'])) {
    $orderID = $_GET['id'];
    $status = $_GET['status'];
    echo $query = "UPDATE orderhistory SET orderStatus = '$status' WHERE orderID = $orderID;";
    $result = mysqli_query($con, $query);
    echo "<script>
    alert('Status changed to " . $status . "');
    window.location.href='../orderdetails.php?id=" . $orderID . "';
    </script>";
};