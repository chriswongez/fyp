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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <title>Document</title>
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
                    <h2>Orders Details for #<?php echo $id ?></h2>
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
                        <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Change Status
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item"
                                    href="./php/changestat.php?status=received&id=<?php echo $id ?>">Order Received</a>
                                <a class="dropdown-item"
                                    href="./php/changestat.php?status=process&id=<?php echo $id ?>">Preparing Food</a>
                                <?php
                                if ($methodcode == 'selfc') {
                                    echo "<a class='dropdown-item'
                                    href='./php/changestat.php?status=ready&id=" . $id . "'>Ready to Self-Collect</a>";
                                    echo "<a class='dropdown-item'
                                    href='./php/changestat.php?status=collected&id=" . $id . "'>Collected</a>";
                                } else if ($methodcode == 'delivery') {
                                    echo "<a class='dropdown-item'
                                    href='./php/changestat.php?status=delivering&id=" . $id . "'>Delivering Food</a>";
                                    echo "<a class='dropdown-item'
                                    href='./php/changestat.php?status=delivered&id=" . $id . "'>Delivered</a>";
                                }
                                ?>
                                <a class="dropdown-item"
                                    href="./php/changestat.php?status=cancel&id=<?php echo $id ?>">Cancelled</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- <div class="table-responsive">
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
                        $result = mysqli_query($con, "SELECT * FROM orderhistory,users where orderhistory.userID = users.userID");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                        <td class='align-middle'><a href='./orderdetails.php?id=" . $row['orderID'] . "'>" . $row['orderID'] . "</a></td>
                        <td class='align-middle'>" . $row['username'] . "</td>
                        <td class='align-middle'>" . $row['orderDate'] . "</td>
                        <td class='align-middle '>RM " . number_format((float)$row['orderPay'], 2, '.', '') . "</td>
                        <td class='align-middle text-center'>" . $row['orderMethod'] . "</td>
                        <td class='align-middle text-center'>" . $row['orderStatus'] . "</td>
                    </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div> -->
            </main>
        </div>
    </div>
</body>

</html>
<?php include_once("./templates/footer.php"); ?>



<!-- <script type="text/javascript" src="./js/customers.js"></script> -->