<?php
session_start();
require('./php/dbconnect.php');
if (!empty($_SESSION['username'])) {
    echo "<script>
        window.location.href='./index.php';
        </script>";
}
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

    <title>Login</title>
</head>

<body>
    <?php include "./navbar.php"; ?>

    <script>
    window.onload = () => {
        document.getElementById("login-btn").classList.add("active");
    };
    </script>

    <div class="w3-container w3-card w3-round-large w3-sand login">

        <h2 style="text-align: center; padding: 0px 16px; margin-top: 15px; margin-bottom: 0">
            Please enter your email to reset your password
        </h2>
        <p style=" padding: 0px 16px; margin-top: 15px; ">An e-mail will be send to you with instruction on how to reset
            your password.</p>
        <div class="loginregister">

            <form method="POST" action="" class="w3-container" style="margin: 15px 15px; width: 50%">

                <table>
                    <tr>
                        <td>
                            <p>Email:</p>
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Enter your e-mail address" required />
                        </td>
                    </tr>
                </table>
                <input type="submit" name="reset-submit" class="w3-orange w3-text-white w3-round" value="Login" />

                <?php //debug
                // echo $_SESSION['username'] . $_SESSION['userlevel'];
                ?>

            </form>
        </div>
    </div>
    <footer>
        &copy;2020 Foodie. All Right Reserved.

    </footer>
</body>

</html>