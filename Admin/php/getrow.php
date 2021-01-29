<?php
include("dbconnect.php");

if (isset($_POST['passid'])) {
    $id = $_POST['passid'];
    $result = mysqli_query($con, "SELECT * FROM `product` where productCode='$id'");
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if ($rows == 1) {

        echo json_encode(['prodID' => $row['productID'], 'prodCode' => $row['productCode'], 'prodName' => $row['productName'], 'prodDesc' => $row['productDesc'], 'prodPrice' => $row['productPrice'], 'prodImg' => $row['productImg'], 'prodCategory' => $row['productCategory']]);
    }
}