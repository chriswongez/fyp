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
                    <span>
                        Click on the order number to view the order details, update order status.
                    </span>
                </div>
                <div class="col-2">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="./customer_orders.php">By Order ID (Latest)</a>
                            <a class="dropdown-item" href="./customer_orders.php?sort=status">By Order ID, Group By Order Status</a>
                            <a class="dropdown-item" href="./customer_orders.php?sort=method">By Order ID, Group By Order Method</a>
                        </div>
                    </div>
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
                        if (isset($_GET['sort'])) {
                            if ($_GET['sort'] == "status") {
                                include('./php/sortbyidgrpbystat.php');
                            } else if ($_GET['sort'] == "method") {
                                include('./php/sortbyidgroupbymethod.php');
                            }
                        } else
                            include('./php/sortbyid.php');
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