<?php
session_start();
require('../php/dbconnect.php');
include('../php/loginstate.php');

$_SESSION['email'] = $_POST['email'];
$_SESSION['first'] = $_POST['firstname'];
$_SESSION['last'] = $_POST['lastname'];

if (isset($_POST['set']) && isset($_SESSION['userID']) && $_SESSION['setmethod'] == 'selfc') {
    $datetimenow = date("Y-m-d H:i:s");
    $_SESSION['date'] = $datetimenow;
    $total = $_SESSION['totalprice'];
    $method = $_SESSION['setmethod'];
    $id = $_SESSION['userID'];
    $query = "INSERT into orderhistory (orderDate, orderPay, orderMethod, orderStatus, userID) 
    VALUES ('$datetimenow', $total , '$method', 'received', $id);";
    // $result = mysqli_query($con, $query);
    // $orderID = mysqli_insert_id($con);
    // if ($result) {
    //     echo "<br> Success";
    // }
    if (!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $product) {
            $prodCode = $product['productCode'];
            $quantity = $product['quantity'];
            $query = "INSERT into orderitem (orderID, productCode, quantity) 
            VALUES ('$orderID', '$prodCode' , $quantity);";
            // $result = mysqli_query($con, $query);
        }
    }

    $usercon = $_POST['contact'];
    $useremail = $_POST['email'];
    $userfn = $_POST['firstname'];
    $userln = $_POST['lastname'];
    $query = "UPDATE users SET usercontact = '$usercon', useremail = '$useremail', userfirst = '$userfn', userlast = '$userln' WHERE userID = $id;";
    // $result = mysqli_query($con, $query);
    // unset($_SESSION["cart"]);
    // unset($_SESSION["menustat"]);
    // unset($_SESSION['setmethod']);
    // unset($_SESSION['setvalue']);
    // unset($_SESSION['totalprice']);
    // unset($_SESSION['date']);
    // unset($_SESSION['email']);
    // unset($_SESSION['first']);
    // unset($_SESSION['last']);

    echo "<script>
    alert('Thank you for your order!');
    window.location.href='../receipt.php?orderid=" . $orderID . "';
    </script>";
} else if (isset($_POST['set']) && isset($_SESSION['userID']) && $_SESSION['setmethod'] == 'delivery') {
    $datetimenow = date("Y-m-d H:i:s");
    $_SESSION['date'] = $datetimenow;
    $total = $_SESSION['totalprice'];
    $method = $_SESSION['setmethod'];
    $id = $_SESSION['userID'];
    $query = "INSERT into orderhistory (orderDate, orderPay, orderMethod, orderStatus, userID) VALUES ('$datetimenow', $total , '$method', 'received', $id);";
    // $result = mysqli_query($con, $query);
    // $orderID = mysqli_insert_id($con);
    // if ($result) {
    //     echo "<br> Success";
    // }
    if (!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $product) {
            $prodCode = $product['productCode'];
            $quantity = $product['quantity'];
            $query = "INSERT into orderitem (orderID, productCode, quantity) VALUES ('$orderID', '$prodCode' , $quantity);";
            // $result = mysqli_query($con, $query);
        }
    }

    $usercon = $_POST['contact'];
    $useremail = $_POST['email'];
    $userfn = $_POST['firstname'];
    $userln = $_POST['lastname'];
    $useradd = $_POST['address'];
    $usercity = $_POST['city'];
    $userst = $_POST['state'];
    $userzip = $_POST['zip'];
    $query = "UPDATE users SET usercontact = '$usercon', 
    useremail = '$useremail', userfirst = '$userfn', userlast = '$userln', 
    userAdd = '$useradd', userCity = '$usercity', userState = '$userst', 
    userZip = '$userzip' WHERE userID = $id;";
    // $result = mysqli_query($con, $query);
    // unset($_SESSION["cart"]);
    // unset($_SESSION["menustat"]);
    // unset($_SESSION['setmethod']);
    // unset($_SESSION['setvalue']);
    // unset($_SESSION['totalprice']);
    // unset($_SESSION['date']);
    // unset($_SESSION['email']);
    // unset($_SESSION['first']);
    // unset($_SESSION['last']);
    echo "<script>
    alert('Thank you for your order!');
    window.location.href='../receipt.php?orderid=" . $orderID . "';
    </script>";
}