<?php
session_start();
require('./php/dbconnect.php');
//reset login session
if (isset($_POST['reset'])) {
    unset($_SESSION["username"]);
    unset($_SESSION["userlevel"]);
}
//login
if (isset($_POST['logusername'])) {

    $username = stripslashes($_REQUEST['logusername']); // removes backslashes
    $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
    $password = stripslashes($_REQUEST['logpassword']);
    $password = mysqli_real_escape_string($con, $password);

    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='$username' and userpass='$password'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    // $_SESSION['result'] = $row['userlevel'] . " " . $row['username'];
    if ($rows == 1 && $row['isBlock'] == 1) {
        echo "<script>
      alert('Your account is blocked! Please contact us!');
      window.location.href='./index.php';
      </script>";
        exit;
    } else if ($rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['userlevel'] = $row['userlevel'];
        $_SESSION['userID'] = $row['userID'];
        unset($_SESSION["cart"]);
        unset($_SESSION["menustat"]);
        unset($_SESSION['totalprice']);
        echo "<script>
      alert('You are now logged in as " . $_SESSION['username'] . "');
      window.location.href='./index.php';
      </script>";
    } else {
        echo "<script>
      alert('Username/password is incorrect.');
      window.location.href='./login.php';
      </script>";
    }
}

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
<script>

</script>

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

        <h1 style="padding: 0px 16px; margin-top: 15px; margin-bottom: 0">
            Welcome! Please login.
        </h1>
        <div class="loginregister">

            <form method="POST" class="w3-container" style="margin: 15px 15px; width: 50%">

                <table>
                    <tr>
                        <td>
                            <p>Username:</p>
                        </td>
                        <td>
                            <input type="text" name="logusername" placeholder="Username" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Password:</p>
                        </td>
                        <td>
                            <input type="password" name="logpassword" placeholder="Password" required />
                        </td>
                    </tr>

                </table>
                <input type="submit" class="w3-orange w3-text-white w3-round" value="Login" />

                <?php //debug
                // echo $_SESSION['username'] . $_SESSION['userlevel'];
                ?>

            </form>
            <h6>Not a user? <a href="./register.php">Register here</a></h6>
        </div>
    </div>
    <footer>
        &copy;2020 Foodie. All Right Reserved.

    </footer>
</body>

<script>
window.onload = () => {
    document.getElementById("login-btn").classList.add("active");
};
</script>

</html>