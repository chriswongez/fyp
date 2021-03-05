<?php
session_start();
include('../php/loginstate.php');
include('../php/dbconnect.php');
$userID = $_SESSION['userID'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./include/header.php');
    ?>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <link rel="stylesheet" href="order.css" />
    <title>Order History</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include('./usersidebar.php');
        ?>
        <div class="container-fluid">
            <span class="display-1 ">Order History</span>
            <hr>
            <span>Click on the Order ID number to view its order detail.<br>Note: You can <b>only</b> cancel your order when the status is <b>"Order Received"</b></span>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <th>Order ID</th>
                    <th>Order date</th>
                    <th>Amount Paid</th>
                    <th class='align-middle text-center'>Order method</th>
                    <th class='align-middle text-center'>Status</th>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM orderhistory WHERE userID = '$userID' ORDER BY orderID DESC");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td class='align-middle'><a href='./userorderdetail.php?id=" . $row['orderID'] . "'>" . $row['orderID'] . "</a></td>
                        <td class='align-middle'>" . $row['orderDate'] . "</td>
                        <td class='align-middle '>RM " . number_format((float)$row['orderPay'], 2, '.', '') . "</td>
                        ";
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
                        echo "<td class='align-middle text-center'>" . $method . "</td>
                        <td class='align-middle text-center'>" . $statstr . "</td>
                    </tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </main>
</body>

</html>
<?php
include('./include/footer.php');
?>