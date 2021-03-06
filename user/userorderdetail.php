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
        else if ($status == 'ready') {
            $statstr = "Ready for Self-Collect";
            $statupdate = "Your order is ready to be collected";
        } else if ($status == 'cancel')
            $statstr = "Order Cancelled";
        else if ($status == 'collected')
            $statstr = "Order Collected";
    } else if ($row['orderMethod'] == 'delivery') {
        if ($status == 'received')
            $statstr = "Order Received";
        else if ($status == 'process')
            $statstr = "Preparing Food";
        else if ($status == 'delivering') {
            $statstr = "Delivering";
            $statupdate = "Your order is delivering";
        } else if ($status == 'delivered')
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
    <meta http-equiv="refresh" content="5">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
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
                    <span>Note: This page reload every 5 seconds</span>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <h3>Status : <span class="text-danger"><?php echo $statstr ?></h3>


                </div>
                <?php
                if ($status == 'ready' || $status == 'delivering') {
                    echo "<h4 class='text-success mt-1'>" . $statupdate . "</h4>";
                }
                ?>
                <div class="row">
                    <div class="col-7">
                        <table class="table table-bordered">
                            <tbody>
                                <?php
                                $query = "SELECT * FROM orderhistory, users, product, orderitem where orderhistory.orderID = $id and orderhistory.userID = users.userID and orderhistory.orderID = orderitem.orderID and orderitem.productCode = product.productCode";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                    <td style='width: 150px;' rowspan='2' class='p-0'>
                                        <img style='' src='../product/" . $row['productImg'] . "'
                                            class='img-fluid '>
                                    </td>
                                    <td>
                                        <div class='container p-0'>
                                            <div class='row'>

                                                <div class='col-3'>Product Code: " . $row['productCode'] . "</div>
                                                <div class='col'>Product Name: " . $row['productName'] . "</div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class='row'>
                                            <div class='col-11 text-right'>Quantity : </div>
                                            <div class='col'>" . $row['quantity'] . "</div>
                                        </div>
                                    </td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div style="height: 150px;" class="col bg-secondary rounded d-flex align-items-center">
                        <div class="container">
                            <table>
                                <tr>
                                    <td>
                                        <h4 class=" text-white ">Order Date </h4>
                                    </td>
                                    <td>
                                        <h4 class=" text-white "> : <?php echo $date ?></h4>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <h4 class=" text-white ">Order Method </h4>
                                    </td>
                                    <td>
                                        <h4 class=" text-white "> : <?php echo $method ?></h4>
                                    </td>

                                </tr>
                                <?php if ($status == 'received') {
                                    echo "<tr>
                                    <td>
                                        <a class='btn btn-danger' data-toggle='modal'
                                            data-target='#cancel_order_modal'>Cancel</a>
                                    </td>
                                </tr>";
                                }
                                ?>

                            </table>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>
    <div class="modal fade" id="cancel_order_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./cancelorder.php" method="post">
                        <div class="row">
                            <div class="col">
                                Are you sure to cancel this order?
                            </div>
                            <div class="col-3">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
include('./include/footer.php');
?>