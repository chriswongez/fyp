<?php
include("dbconnect.php");
if (isset($_POST['add_product']) && $_POST['add_product'] == 1) {
    $pname = $_POST['product_name'];
    $pcode = $_POST['product_code'];
    $pcat = $_POST['category'];
    $pdesc = $_POST['product_desc'];
    $pprice = $_POST['product_price'];

    echo "<br>" . $query = "INSERT into product (productCode, productName, productDesc, productPrice, productCategory) VALUES ('$pcode', '$pname', '$pdesc', '$pprice','$pcat')";
    $result = mysqli_query($con, $query);

    // img upload module
    $filename = $_FILES["product_image"]["name"];
    $tempname = $_FILES["product_image"]["tmp_name"];
    $folder = "C:/xampp/htdocs/fyp/product/" . $filename;

    echo "<br>" . $query = "UPDATE product SET productImg = '$filename' WHERE productCode = '$pcode';";

    mysqli_query($con, $query);

    if (move_uploaded_file($tempname, $folder)) {
        echo "<br>" . $msg = "Image uploaded successfully";
    } else {
        echo "<br>" . $msg = "Failed to upload image";
    }
}

if (isset($_POST['edit_product']) && $_POST['edit_product'] == 1) {
    $pname = $_POST['e_product_name'];
    $pcode = $_POST['e_product_code'];
    $oricode = $_POST['oricode'];
    $pcat = $_POST['e_category'];
    $pdesc = $_POST['e_product_desc'];
    $pprice = $_POST['e_product_price'];

    echo "<br>" . $query = "UPDATE product SET productName = '$pname', productDesc = '$pdesc', productPrice = '$pprice', productCategory = '$pcat' WHERE productCode = '$oricode';";
    $result = mysqli_query($con, $query);
    if ($result) {
        // img upload module
        $filename = $_FILES["e_product_image"]["name"];
        $tempname = $_FILES["e_product_image"]["tmp_name"];
        $folder = "C:/xampp/htdocs/fyp/product/" . $filename;

        echo "<br>" . $query = "UPDATE product SET productImg = '$filename' WHERE productCode = '$pcode';";

        mysqli_query($con, $query);

        if (move_uploaded_file($tempname, $folder)) {
            echo "<br>" . $msg = "Image changed successfully";
        } else {
            echo "<br>" . $msg = "Failed to upload image";
        }
    }
}