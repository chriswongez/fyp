<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Document</title>
</head>


<?php session_start();
include("../php/dbconnect.php");
include_once("./templates/top.php");
?>

<body>
    <div class="container-fluid">
        <div class="row">


            <?php include("./Adminnavbar.php")
            ?>


            <div class="row">
                <div class="col-10">
                    <h2><i class="fas fa-hamburger"></i> Orders</h2>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>User</th>
                            <th>Date and Time</th>
                            <th>Total Payment</th>
                            <th class="text-center">Order Method</th>
                            <th class="text-center">Order Status</th>
                        </tr>
                    </thead>
                    <tbody id="customer_order_list">
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM orderhistory,users where orderhistory.userID = users.userID ORDER BY orderID DESC");
                        while ($row = mysqli_fetch_assoc($result)) {
                            $status = $row['orderStatus'];
                            if ($row['orderMethod'] == 'selfc') {
                                $method = "Self Collect";
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
                                $method = "Delivery";
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
                            echo "<tr>
                        <td class='align-middle'><a href='./orderdetails.php?id=" . $row['orderID'] . "'>" . $row['orderID'] . "</a></td>
                        <td class='align-middle'>" . $row['username'] . "</td>
                        <td class='align-middle'>" . $row['orderDate'] . "</td>
                        <td class='align-middle '>RM " . number_format((float)$row['orderPay'], 2, '.', '') . "</td>
                        <td class='align-middle text-center'>" . $method . "</td>
                        <td class='align-middle text-center'>" . $statstr . "</td>
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </main>
        </div>
    </div>
</body>

</html>
<?php include_once("./templates/footer.php"); ?>



<!-- <script type="text/javascript" src="./js/customers.js"></script> -->