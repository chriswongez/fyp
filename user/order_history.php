<?php
session_start();
include('../php/loginstate.php');
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
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include('./usersidebar.php');
        ?>
        <div class="container-fluid">
            <span class="display-1 ">Order History</span>
            <hr>
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <th>Order detail</th>
                    <th>Order date</th>
                    <th>Order method</th>
                    <th>Status</th>
                    <th>Amount Paid</th>
                </thead>
                <tbody></tbody>

            </table>
        </div>
    </main>
</body>

</html>
<?php
include('./include/footer.php');
?>