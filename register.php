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
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        $query = "SELECT * FROM users WHERE useremail='$email'";
        $result = mysqli_query($con, $query);
        $rows1 = mysqli_num_rows($result);
        if ($rows == 1 || $rows1 == 1) { //check username in use
            echo "<script>
        alert('Username or email in used!\\nPlease try again.');
        window.location.href='./register.php';
        </script>";
            exit;
        } else {
            //if password match and no username in use, register account to system
            $query = "INSERT into users (username, userpass, userlevel, useremail) VALUES ('$username', '$password', 'user', '$email')";
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
        window.location.href='./register.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/loginregister.css" />
    <link rel="stylesheet" href="./css/w3.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <title>Register Account</title>
</head>

<body class="">
    <?php include "./navbar.php"; ?>

    <div class="w3-container w3-card w3-round-large w3-sand register">

        <h1 style="padding: 0px 16px; margin-top: 15px; margin-bottom: 0">
            Welcome! Please Register.
        </h1>
        <div class="loginregister">
            <!-- <form action="" method="post">
                <input type="hidden" name="reset">
                <input type="submit" value="reset">
            </form> -->

            <form method="POST" class="w3-container" style="margin: 15px 15px; width: 50%">

                <table>
                    <tr>
                        <td>
                            <p>Username:</p>
                        </td>
                        <td>
                            <p><input type="text" name="regusername" placeholder="Username" required /></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Password:</p>
                        </td>
                        <td>
                            <p>
                                <input type="password" name="regpassword" placeholder="Mininum 8 characters" minlength="8" required />
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Confirm Password:</p>
                        </td>
                        <td>
                            <input type="password" name="regconpassword" placeholder="Confirm password" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>E-mail:</p>
                        </td>
                        <td>
                            <p>
                                <input type="email" name="regemail" placeholder="example@xxx.com" required />
                            </p>
                        </td>
                    </tr>
                </table>
                <input type="submit" class="w3-orange w3-round w3-text-white" value="Register" />
            </form>
        </div>
    </div>
    <footer>
        &copy;2020 Foodie. All Right Reserved.

    </footer>
</body>

</html>