<?php session_start();
include("./php/dbconnect.php");

$deli_received = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'delivery' and orderStatus = 'received'"));
$deli_process = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'delivery' and orderStatus = 'process'"));
$deli_delivering = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'delivery' and orderStatus = 'delivering'"));
$deli_delivered = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'delivery' and orderStatus = 'delivered'"));
$deli_cancelled = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'delivery' and orderStatus = 'cancel'"));
$self_received = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'selfc' and orderStatus = 'received'"));
$self_process = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'selfc' and orderStatus = 'process'"));
$self_ready = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'selfc' and orderStatus = 'ready'"));
$self_collect = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'selfc' and orderStatus = 'collected'"));
$self_cancelled = mysqli_num_rows(mysqli_query($con, "SELECT * FROM orderhistory WHERE orderMethod = 'selfc' and orderStatus = 'cancel'"));


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/admin.css" />
    <script src="https://kit.fontawesome.com/08d8dbd162.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</head>

<body>

    <?php
    include_once("./templates/top.php");
    include("./Adminnavbar.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <div class="d-flex flex-row">

                    <h2 class="d-flex align-items-center">
                        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
                    </h2>

                </div>

            </div>


        </div>

    </div>

    <div class="row">
        <div class="container px-2 w-50">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-header bg-secondary">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span style="font-size: 20px;" class="text-white d-inline-block py-1">Delivery</span style="font-size: 20px;">
                </div>
                <div class="card-body py-0">
                    <div class="row">
                        <div class=" col-5 mx-auto mt-2 bg-primary border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fab fa-joget"></i>
                                </span>
                                Received :
                            </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $deli_received ?></span>


                        </div>
                        <div class=" col-5 mx-auto mt-2 bg-warning border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                                </span>
                                Procesing : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $deli_process ?></span>
                        </div>
                        <div class=" col-5 mx-auto mt-2 bg-info border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fa fa-car" aria-hidden="true"></i>
                                </span>
                                Delivering : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $deli_delivering ?></span>
                        </div>
                        <div class=" col-5 mx-auto mt-2 bg-success border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                </span>
                                Delivered : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $deli_delivered ?></span>
                        </div>
                        <div class=" col-5 mx-auto my-2 bg-danger border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </span>
                                Cancelled : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $deli_cancelled ?></span>
                        </div>
                        <div class=" col-5 mx-auto my-2"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container px-2 w-50">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-header bg-secondary">
                    <i class="fas fa-hand-pointer"></i>
                    <span style="font-size: 20px;" class="text-white d-inline-block py-1">Self-Collect</span style="font-size: 20px;">
                </div>
                <div class="card-body py-0">
                    <div class="row">
                        <div class=" col-5 mx-auto mt-2 bg-primary border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fab fa-joget"></i>
                                </span>
                                Received : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $self_received ?></span>
                        </div>
                        <div class=" col-5 mx-auto mt-2 bg-warning border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                                </span>
                                Procesing : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $self_process ?></span>
                        </div>
                        <div class=" col-5 mx-auto mt-2 bg-info border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>
                                </span>
                                Ready to collect : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $self_ready ?></span>
                        </div>
                        <div class=" col-5 mx-auto mt-2 bg-success border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                </span>
                                Collected : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $self_collect ?></span>
                        </div>
                        <div class=" col-5 mx-auto my-2 bg-danger border rounded">
                            <span class="text-white pt-4 d-block">
                                <span style="font-size: 20px; color: while; ">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </span>
                                Cancelled : </span>
                            <span style="font-size: 20px;" class=" text-white pb-4 d-block"><?php echo $self_cancelled ?></span>
                        </div>
                        <div class=" col-5 mx-auto my-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="container px-2 w-100">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-header bg-secondary">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span style="font-size: 20px;" class="text-white d-inline-block py-1">Order</span style="font-size: 20px;">
                </div>
                <div class="card-body py-0">
                    <div class="row">
                        <canvas id="Orders"></canvas>

                    </div>

                </div>
            </div>
        </div>
        <div class="container px-2 w-100">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-header bg-secondary">
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
                    <span style="font-size: 20px;" class="text-white d-inline-block py-1">Product Sales</span style="font-size: 20px;">
                </div>
                <div class="card-body py-0">
                    <div class="row">
                        <canvas id="Sales"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="container px-2 w-100">
            <div class="card w-100" style="width: 18rem;">
                <div class="card-header bg-secondary">
                    <i class="fa fa-history" aria-hidden="true"></i>
                    <span style="font-size: 20px;" class="text-white d-inline-block py-1">Order details history</span style="font-size: 20px;">
                </div>
                <div class="card-body py-0">
                    <div class="row">
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

                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
<?php include_once("./templates/footer.php"); ?>

</html>


<Script>
    var ctx = document.getElementById('Orders').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ],
            datasets: [{
                    label: 'Orders Made',
                    backgroundColor: 'rgb(66, 186, 150)',
                    borderColor: 'rgb(66, 186, 150)',
                    data: [100, 112, 130, 133, 87, 67, 200, 240, 223, 250, 256, 300]
                },
                {
                    label: 'Orders Cancelled',
                    backgroundColor: 'rgb(223, 71, 89)',
                    borderColor: 'rgb(223, 71, 89)',
                    data: [0, 2, 1, 5, 15, 20, 7, 5, 0, 2, 1, 3, 6]
                }
            ]
        },

        // Configuration options go here
        options: {}
    });

    var ctx = document.getElementById('Sales').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ],
            datasets: [{
                label: 'Food',
                backgroundColor: 'rgb(255,255,0,0)',
                borderColor: 'rgb(255,255,0)',
                data: [452, 462, 864, 356, 795, 453, 215, 896, 452, 725, 635, 562]
            }, {
                label: 'Beverage',
                backgroundColor: 'rgb(128,197,222,0)',
                borderColor: 'rgb(128,197,222)',
                data: [153, 251, 232, 325, 215, 235, 432, 215, 123, 251, 223, 221]
            }]
        },

        // Configuration options go here
        options: {

        }
    });
</Script>