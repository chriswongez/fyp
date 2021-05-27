<?php session_start();
include("../php/dbconnect.php");


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
        if ($status == 'received') {
            $statstr = "Order Received";
            $next = 'process';
            $prog1 = "color: red;";
        } else if ($status == 'process') {
            $statstr = "Preparing Food";
            $next = 'ready';
            $prog2 = "color: red;";
        } else if ($status == 'ready') {
            $statstr = "Ready for Self-Collect";
            $next = 'collected';
            $prog3 = "color: red;";
        } else if ($status == 'cancel') {
            $statstr = "Order Cancelled";
        } else if ($status == 'collected') {
            $statstr = "Order Collected";
            $prog4 = "color: red;";
        }
    } else if ($row['orderMethod'] == 'delivery') {
        if ($status == 'received') {
            $statstr = "Order Received";
            $next = 'process';
            $prog1 = "color: red;";
        } else if ($status == 'process') {
            $statstr = "Preparing Food";
            $next = 'delivering';
            $prog2 = "color: red;";
        } else if ($status == 'delivering') {
            $statstr = "Delivering";
            $next = 'delivered';
            $prog3 = "color: red;";
        } else if ($status == 'delivered') {
            $statstr = "Food Delivered";
            $prog4 = "color: red;";
        } else if ($status == 'cancel')
            $statstr = "Order Cancelled";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/08d8dbd162.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous"> -->


    <title>Orders Details for #<?php echo $id ?></title>
</head>
<?php
include_once("./templates/top.php");
?>

<body>
    <div class="container-fluid">
        <div class="row">


            <?php include("./Adminnavbar.php")
            ?>


            <div class="row">
                <div class="col-10">

                    <span>
                        <h2><a class="btn btn-sm btn-secondary" href="./customer_orders.php"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z" />
                                </svg></a> Orders Details for #<?php echo $id ?></h2>
                    </span>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-7 ">
                        <h3>Status : <span class="text-danger"><?php echo $statstr ?></span></h3>
                        <table class="table table-bordered w-100">
                            <thead class="thead-dark">
                                <tr>
                                    <th class='text-center'>Product Code</th>
                                    <th>Product Name</th>
                                    <th class='text-center'>Product Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM orderhistory, users, product, orderitem where orderhistory.orderID = $id and 
                                orderhistory.userID = users.userID and orderhistory.orderID = orderitem.orderID and orderitem.productCode = product.productCode";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                    <td class='text-center'>" . $row['productCode'] . "</td>
                                    <td>" . $row['productName'] . "</td>
                                    <td class='text-center'>" . $row['quantity'] . "</td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <p>Progress :</p>
                        <?php
                        if ($methodcode == 'selfc') { ?>
                            <h5 style="<?php echo $prog1 ?>"><i class="fas fa-check"></i> Order Received</h5>
                            <h5 style="<?php echo $prog2 ?>"><i class="fas fa-mitten"></i> Preparing Food</h5>
                            <h5 style="<?php echo $prog3 ?>"><i class="fas fa-hand-sparkles"></i> Ready for Self-Collect</h5>
                            <h5 style="<?php echo $prog4 ?>"><i class="fas fa-user-check"></i> Order Collected</h5>
                        <?php
                        } else if ($methodcode == 'delivery') { ?>
                            <h5 style="<?php echo $prog1 ?>"><i class="fas fa-check"></i> Order Received</h5>
                            <h5 style="<?php echo $prog2 ?>"><i class="fas fa-mitten"></i> Preparing Food</h5>
                            <h5 style="<?php echo $prog3 ?>"><i class="fas fa-truck"></i> Delivering</h5>
                            <h5 style="<?php echo $prog4 ?>"><i class="fas fa-user-check"></i> Food Delivered</h5>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="col bg-light border rounded p-2 px-auto ">
                        <table class="table  table-striped mx-auto">
                            <tr>
                                <td>Order ID : </td>
                                <td><?php echo $id ?></td>
                            </tr>
                            <tr>
                                <td>Order Date : </td>
                                <td><?php echo $date ?></td>
                            </tr>
                            <tr>
                                <td>Order Method : </td>
                                <td><?php echo $method ?></td>
                            </tr>
                            <tr>
                                <td>Customer's Username : </td>
                                <td><?php echo $username ?></td>
                            </tr>
                            <tr>
                                <td>Customer's Contact : </td>
                                <td><?php echo $contact ?></td>
                            </tr>
                            <tr>
                                <td>Customer's Email : </td>
                                <td><?php echo $email ?></td>
                            </tr>

                        </table>
                        <!-- <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Change Status
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="./php/changestat.php?status=received&id=<?php //echo $id 
                                                                                                        ?>">Order Received</a>
                                <a class="dropdown-item" href="./php/changestat.php?status=process&id=<?php //echo $id 
                                                                                                        ?>">Preparing Food</a>
                                <?php
                                // if ($methodcode == 'selfc') {
                                //     echo "<a class='dropdown-item'
                                //     href='./php/changestat.php?status=ready&id=" . $id . "'>Ready to Self-Collect</a>";
                                //     echo "<a class='dropdown-item'
                                //     href='./php/changestat.php?status=collected&id=" . $id . "'>Collected</a>";
                                // } else if ($methodcode == 'delivery') {
                                //     echo "<a class='dropdown-item'
                                //     href='./php/changestat.php?status=delivering&id=" . $id . "'>Delivering Food</a>";
                                //     echo "<a class='dropdown-item'
                                //     href='./php/changestat.php?status=delivered&id=" . $id . "'>Delivered</a>";
                                // }
                                ?>
                                <a class="dropdown-item" href="./php/changestat.php?status=cancel&id=<?php //echo $id 
                                                                                                        ?>">Cancelled</a>
                            </div>
                        </div> -->
                        <?php
                        if ($status != 'delivered' && $status != 'collected' && $status != 'cancel') {
                        ?>
                            <a class="btn btn-secondary" href="./php/changestat.php?status=<?php echo $next ?>&id=<?php echo $id ?>">Change to next status</a>
                            <a class="btn btn-secondary" href="./php/changestat.php?status=cancel&id=<?php echo $id ?>">Cancel</a>
                            <br>
                            <span>Click on "Change to next status" to change to next status of the progress</span>
                        <?php } ?>
                    </div>


                </div>
            </div>
            </main>
        </div>
    </div>
</body>

</html>
<?php include_once("./templates/footer.php"); ?>



<!-- <script type="text/javascript" src="./js/customers.js"></script> -->