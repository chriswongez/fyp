<?php
session_start();
include('../php/loginstate.php');
include('../php/dbconnect.php');

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $query = "SELECT * FROM users WHERE userID = '$userID'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $useremail = $row['useremail'];
    }
}

if (isset($_POST['save']) && $_POST['save'] == 1) {
    $newusername = stripslashes($_REQUEST['username']);
    $newusername = mysqli_real_escape_string($con, $newusername);
    $newemail = stripslashes($_REQUEST['email']);
    $newemail = mysqli_real_escape_string($con, $newemail);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $conpass = stripslashes($_REQUEST['conpass']);
    $conpass = mysqli_real_escape_string($con, $conpass);

    if ($password == $conpass) { //check password match with confirm password
        $query = "SELECT * FROM `users` WHERE username='$newusername' AND username!='$username'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        $query = "SELECT * FROM `users` WHERE useremail='$newemail' AND useremail!='$useremail'";
        $result = mysqli_query($con, $query);
        $rowss = mysqli_num_rows($result);
        if ($rows == 1) { //check username in use
            echo "<script>
        alert('Username in used!\\nPlease try again.');
        window.location.href='./account_info.php';
        </script>";
            exit;
        } else if ($rowss == 1) { //check email in use
            echo "<script>
        alert('Email in used!\\nPlease try again.');
        window.location.href='./account_info.php';
        </script>";
            exit;
        } else {
            //if password match and no username in use, register account to system
            $query = "UPDATE users SET username = '$newusername', userpass = '$password', useremail = '$newemail' WHERE userID = '$userID';";
            $result = mysqli_query($con, $query);
            if ($result) {
                $_SESSION['username'] = $newusername;
                echo "<script>
          alert('Account information updated.');
//window.location.href='./account_info.php';
          </script>";
            }
        }
    } else { //password not matched
        echo "<script>
        alert('Password and Confirm Password not matched\\nPlease try again.');
        window.location.href='./account_info.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./include/header.php');
    ?>
    <title>Account Information</title>
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include('./usersidebar.php');
        ?>
        <div class="container-fluid">
            <span class="display-1 ">Account info</span>
            <hr>
            <h5>Edit your account information</h5>
            <hr>
            <form method="POST">
                <form>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="<?php echo $username ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $useremail ?>" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="conpass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="conpass" name="conpass">
                    </div>
                    <input type="hidden" name="save" value="1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </form>
        </div>


    </main>
</body>

</html>
<?php
include('./include/footer.php');
?>