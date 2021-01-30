<?php session_start();
include("../php/dbconnect.php");
include_once("./templates/top.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM orderhistory, users, product, orderitem where orderhistory.orderID = $id and orderhistory.userID = users.userID and orderhistory.orderID = orderitem.orderID and orderitem.productCode = product.productCode";
    $result = mysqli_query($con, $query);
    $numrow = mysqli_num_rows($result);
    json_encode($row = mysqli_fetch_assoc($result));
    $date = $row['orderDate'];
    $username = $row['username'];
    if ($row['orderMethod'] == 'selfc') {
        $method = "Self Collect";
    } else
        $method = "Delivery";
    $contact = $row['usercontact'];
    $email = $row['useremail'];
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

            <div class="container">
                <div class="row">
                    <div class="col-7">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM orderhistory, users, product, orderitem where orderhistory.orderID = $id and orderhistory.userID = users.userID and orderhistory.orderID = orderitem.orderID and orderitem.productCode = product.productCode";
                                $result = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                    <td>" . $row['productCode'] . "</td>
                                    <td>" . $row['productName'] . "</td>
                                    <td>" . $row['quantity'] . "</td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col bg-light border rounded p-2 px-auto">
                        <table class="table-sm  table-striped">
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