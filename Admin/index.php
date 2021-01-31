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
    <link rel="stylesheet" href="./css/admin.css" />
    <script src="https://kit.fontawesome.com/08d8dbd162.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">


</head>

<body>
    <main role="main" class="col-md-10 mx-auto col-lg-10 px-4">
        <?php
        include_once("./templates/top.php");
        include("./Adminnavbar.php");
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <div class="d-flex flex-row">

                        <h2 class="d-flex align-items-center">Dashboard</h2>

                        <i class="far fa-bell ml-3 d-flex align-items-center"></i>
                        <i class="far fa-comments ml-3 d-flex align-items-center"></i>


                    </div>

                </div>
                <div class="col-3">
                    <i class="fas fa-search"></i>
                    <input type="search" placeholder="search">
                </div>

            </div>

        </div>

        <div class="row">
            <div class="container px-2 w-50">
                <div class="card w-100" style="width: 18rem;">
                    <div class="card-header bg-secondary">
                        <i class="fas fa-cart-arrow-down"></i>
                        <span style="font-size: 20px;" class="text-white d-inline-block py-1">Delivery</span
                            style="font-size: 20px;">
                    </div>
                    <div class="card-body py-0">
                        <div class="row">
                            <div class=" col-5 mx-auto mt-2 bg-primary border rounded">
                                <span class="text-white pt-4 d-block">Received : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $deli_received ?></span>
                            </div>
                            <div class=" col-5 mx-auto mt-2 bg-warning border rounded">
                                <span class="text-white pt-4 d-block">Procesing : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $deli_process ?></span>
                            </div>
                            <div class=" col-5 mx-auto mt-2 bg-info border rounded">
                                <span class="text-white pt-4 d-block">Delivering : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $deli_delivering ?></span>
                            </div>
                            <div class=" col-5 mx-auto mt-2 bg-success border rounded">
                                <span class="text-white pt-4 d-block">Delivered : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $deli_delivered ?></span>
                            </div>
                            <div class=" col-5 mx-auto my-2 bg-danger border rounded">
                                <span class="text-white pt-4 d-block">Cancelled : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $deli_cancelled ?></span>
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
                        <span style="font-size: 20px;" class="text-white d-inline-block py-1">Self-Collect</span
                            style="font-size: 20px;">
                    </div>
                    <div class="card-body py-0">
                        <div class="row">
                            <div class=" col-5 mx-auto mt-2 bg-primary border rounded">
                                <span class="text-white pt-4 d-block">Received : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $self_received ?></span>
                            </div>
                            <div class=" col-5 mx-auto mt-2 bg-warning border rounded">
                                <span class="text-white pt-4 d-block">Procesing : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $self_process ?></span>
                            </div>
                            <div class=" col-5 mx-auto mt-2 bg-info border rounded">
                                <span class="text-white pt-4 d-block">Ready to collect : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $self_ready ?></span>
                            </div>
                            <div class=" col-5 mx-auto mt-2 bg-success border rounded">
                                <span class="text-white pt-4 d-block">Collected : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $self_collect ?></span>
                            </div>
                            <div class=" col-5 mx-auto my-2 bg-danger border rounded">
                                <span class="text-white pt-4 d-block">Cancelled : </span>
                                <span style="font-size: 20px;"
                                    class=" text-white pb-4 d-block"><?php echo $self_cancelled ?></span>
                            </div>
                            <div class=" col-5 mx-auto my-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="container px-2 w-50">
                <div class="card w-100" style="width: 18rem;">
                    <div class="card-header bg-secondary">
                        <i class="fas fa-cart-arrow-down"></i>
                        <span style="font-size: 20px;" class="text-white d-inline-block py-1">Order</span
                            style="font-size: 20px;">
                    </div>
                    <div class="card-body py-0">
                        <div class="row">




                            <div class=" col-5 mx-auto my-2"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="container px-2 w-50">
                <div class="card w-100" style="width: 18rem;">
                    <div class="card-header bg-secondary">
                        <i class="fas fa-hand-pointer"></i>
                        <span style="font-size: 20px;" class="text-white d-inline-block py-1">Product Sales</span
                            style="font-size: 20px;">
                    </div>
                    <div class="card-body py-0">
                        <div class="row">

                            <div class=" col-5 mx-auto my-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










    </main>
</body>
<?php include_once("./templates/footer.php"); ?>


</html>