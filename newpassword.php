<?php
session_start();
require('./php/dbconnect.php');
// if (!empty($_SESSION['username'])) {
//     echo "<script>
//         window.location.href='./index.php';
//         </script>";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./css/loginregister.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/w3.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

    <title>Create New Password</title>
</head>

<body>
    <?php include "./navbar.php"; ?>

    <div class="w3-container w3-card w3-round-large w3-sand login">

        <!-- header -->
        <div class="loginregister">
            <?php
            $validator = $_GET["validator"];

            if (empty($validator)) {
                echo "<p>Could not validate your resquest!</p>";
            } else {
                $query = "SELECT userID from users";
                $result = mysqli_query($con, $query);;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($validator == md5(bin2hex($row['userID']))) {
                        $reset = true;
                        break;
                    }
                }
                if (isset($reset) && $reset == true) {
            ?>
                    <h2 style="text-align: center; padding: 0px 16px; margin-top: 15px; margin-bottom: 0">
                        Create a new password
                    </h2>
                    <form method="POST" action="./php/resetpwd.inc.php" class="w3-container" style="margin: 15px 15px; width: 50%">

                        <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                        <p>
                            <input type="password" name="pwd" placeholder="Enter a new password...">
                        </p>
                        <p>
                            <input type="password" name="conpwd" placeholder="Repeat new password..." required />
                        </p>
                        <button type="submit" class="w3-orange w3-text-white w3-round" name="reset-submit">Reset
                            Password</button>
                        <?php
                        if (isset($_GET['status'])) {
                            if ($_GET['status'] == 'pwdxmatch') {
                                echo "<p>Password not matched!</p>";
                            } else if ($_GET['status'] == 'success') {
                                echo "<script>alert('You have successfully changed your password')</script>";
                                unset($_SESSION["username"]);
                                unset($_SESSION["userlevel"]);
                                unset($_SESSION["userID"]);
                                unset($_SESSION["cart"]);
                                unset($_SESSION["menustat"]);
                                unset($_SESSION['setmethod']);
                                unset($_SESSION['setvalue']);
                                unset($_SESSION['totalprice']);
                                echo "<script>window.location.href='./login.php';</script>";
                            }
                        }
                        ?>
                    </form>

                <?php
                } else { ?>
                    <form method="POST" class="w3-container" style="margin: 15px 15px; width: 50%">
                        <p>Could not validate your resquest!</p>
                    </form>
            <?php
                }
            }
            ?>



        </div>
    </div>
    <footer>
        &copy;2020 Foodie. All Right Reserved.

    </footer>
</body>

</html>