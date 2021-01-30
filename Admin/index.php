<?php session_start();

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

    </div>




    </main>
</body>

</html>