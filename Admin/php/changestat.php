<?php session_start();
include("dbconnect.php");
include_once("../templates/top.php");

if (isset($_GET['id'])) {
    $orderID = $_GET['id'];
    $status = $_GET['status'];
    $query = "UPDATE orderhistory SET orderStatus = '$status' WHERE orderID = $orderID;";
    $result = mysqli_query($con, $query);

    if ($status == 'received')
        $statstr = "Order Received";
    else if ($status == 'process')
        $statstr = "Preparing Food";
    else if ($status == 'ready')
        $statstr = "Ready for Self-Collect";
    else if ($status == 'cancel')
        $statstr = "Order Cancelled";
    else if ($status == 'collected')
        $statstr = "Order Collected";
    else if ($status == 'delivering')
        $statstr = "Delivering";
    else if ($status == 'delivered')
        $statstr = "Food Delivered";

    echo "<script>
    alert('Status changed to " . $statstr . "');
    window.location.href='../orderdetails.php?id=" . $orderID . "';
    </script>";
};