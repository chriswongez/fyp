<?php
session_start();
include('../php/loginstate.php');
include('../php/dbconnect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM orderhistory, users, product, orderitem where orderhistory.orderID = $id and orderhistory.userID = users.userID and orderhistory.orderID = orderitem.orderID and orderitem.productCode = product.productCode";
    $result = mysqli_query($con, $query);
    $numrow = mysqli_num_rows($result);
    json_encode($row = mysqli_fetch_assoc($result));
    $date = $row['orderDate'];
    $username = $row['username'];
    if ($row['orderMethod'] == 'selfc') {
        $methodcode = $row['orderMethod'];
        $method = "Self Collect";
    } else {
        $methodcode = $row['orderMethod'];
        $method = "Delivery";
    }
    $contact = $row['usercontact'];
    $email = $row['useremail'];
    $status = $row['orderStatus'];
    if ($row['orderMethod'] == 'selfc') {
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
    } else if ($row['orderMethod'] == 'delivery') {
        if ($status == 'received')
            $statstr = "Order Received";
        else if ($status == 'process')
            $statstr = "Preparing Food";
        else if ($status == 'delivering')
            $statstr = "Delivering";
        else if ($status == 'delivered')
            $statstr = "Food Delivered";
        else if ($status == 'cancel')
            $statstr = "Order Cancelled";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./include/header.php');
    ?>
    <title>Order Details</title>
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include('./usersidebar.php');
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <span class="display-1 ">Order Details</span>
                    <hr>
                    <h5>Order details for Order ID <?php echo $id ?></h5>
                    <hr>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <h3>Status : <span class="text-danger"><?php echo $statstr ?></h3>
                </div>
                <div class="row">
                    <div class="col-7">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="">
                                    <td style="width: 150px;" rowspan="2" class="p-0">
                                        <img src="../product/bruger-cheddar-bites-shake-culvers-wisconsin.jpg"
                                            class="img-fluid ">
                                    </td>
                                    <td>
                                        <div class="container p-0">
                                            <div class="row">

                                                <div class="col-3 ">Food Code</div>
                                                <div class="col">Food Name</div>

                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td>Food Name</td> -->
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-10 text-right">Quantity</div>
                                            <div class="col">1</div>
                                        </div>
                                    </td>
                                    <!-- <td>Number</td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>

</html>

<?php
include('./include/footer.php');
?>