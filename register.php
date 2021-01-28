<?php
session_start();
require('./php/dbconnect.php');

//register
if (isset($_REQUEST['regusername'])) {
    $username = stripslashes($_REQUEST['regusername']); // removes backslashes
    $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
    $email = stripslashes($_REQUEST['regemail']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['regpassword']);
    $password = mysqli_real_escape_string($con, $password);
    $conpassword = stripslashes($_REQUEST['regconpassword']);
    $conpassword = mysqli_real_escape_string($con, $conpassword);

    if ($password == $conpassword) { //check password match with confirm password
        $query = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) { //check username in use
            echo "<script>
        alert('Username in used!\\nPlease try again.');
        window.location.href='./login.php';
        </script>";
        } else {
            //if password match and no username in use, register account to system
            $query = "INSERT into `users` (username, userpass, userlevel, useremail) VALUES ('$username', '$password', 'user', '$email')";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script>
          alert('You are registered successfully!\\nPlease login.');
          window.location.href='./login.php';
          </script>";
            }
        }
    } else { //password not matched
        echo "<script>
        alert('Password and Confirm Password not matched\\nPlease try again.');
        window.location.href='./login.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/w3.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <title>Register Account</title>
</head>

<body class="w3-khaki">
    <?php include "./navbar.php"; ?>

</body>

</html>