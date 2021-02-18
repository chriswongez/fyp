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
                    <h2><i class="fas fa-paper-plane"></i> Contact Us</h2>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">phone number</th>
                            <th class="text-center">Message</th>
                        </tr>
                    </thead>
                    <tbody id="customer_order_list">
                        <?php

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