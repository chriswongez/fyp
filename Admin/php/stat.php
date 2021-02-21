<?php
header('Content-Type: application/json');

require("dbconnect.php");

if (isset($_POST['delivery']) && isset($_POST['selfc'])) {


    $data = array();
    $row = array();

    for ($i = 1; $i <= 12; $i++) {
        $query = "SELECT * from orderhistory where MONTH(orderDate) = $i and orderMethod = 'delivery'";
        $result = mysqli_query($con, $query);
        $row['delivery'] = mysqli_num_rows($result);
        $query = "SELECT * from orderhistory where MONTH(orderDate) = $i and orderMethod = 'selfc'";
        $result = mysqli_query($con, $query);
        $row['selfc'] = mysqli_num_rows($result);

        $data[] = $row;
    }

    echo json_encode($data);
}

if (isset($_POST['ordersmade']) && isset($_POST['orderscancel'])) {


    $data = array();
    $row = array();

    for ($i = 1; $i <= 12; $i++) {
        $query = "SELECT * from orderhistory where MONTH(orderDate) = $i and orderStatus<>'cancel'";
        $result = mysqli_query($con, $query);
        $row['made'] = mysqli_num_rows($result);
        $query = "SELECT * from orderhistory where MONTH(orderDate) = $i and orderStatus='cancel'";
        $result = mysqli_query($con, $query);
        $row['cancel'] = mysqli_num_rows($result);

        $data[] = $row;
    }

    echo json_encode($data);
}
