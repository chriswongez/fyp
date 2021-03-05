<?php
session_start();
include('../php/loginstate.php');
include('../php/dbconnect.php');

if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
}

if (isset($_POST['save']) && $_POST['save'] == 1) {
    $oldpassword = stripslashes($_REQUEST['oldpassword']); //get password from form
    $oldpassword = mysqli_real_escape_string($con, $oldpassword);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $conpass = stripslashes($_REQUEST['conpass']);
    $conpass = mysqli_real_escape_string($con, $conpass);

    if ($password == $conpass) { //check password match with confirm password
        $query = "SELECT * FROM users where userpass='$oldpassword'"; //check current password exist
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 0) { //if current password not exist, print error
            echo "<script>
            alert('Current password wrong!\\nPlease try again.');
            </script>";
            exit;
        } else {
            //current password correct and new pass match with con pass, save new password to database
            $query = "UPDATE users SET userpass = '$password' WHERE userID = '$userID';";
            $result = mysqli_query($con, $query);
            if ($result) {
                echo "<script>
                alert('Account information updated.');
                </script>";
            }
        }
    } else { //password not matched, print error
        echo "<script>
        alert('Password and Confirm Password not matched\\nPlease try again.');
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
    <title>Change Password</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include('./usersidebar.php');
        ?>
        <div class="container-fluid">
            <span class="display-1 ">Change Password</span>
            <hr>
            <h5>Change your account password</h5>
            <hr>
            <form method="POST">
                <form>
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <h5>Old Password</h5>
                        </label>
                        <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <h5>Password</h5>
                        </label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="conpass" class="form-label">
                            <h5>Confirm Password</h5>
                        </label>
                        <input type="password" class="form-control" id="conpass" name="conpass">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" onclick="showpassword()"> Show Password
                        <script>
                            function showpassword() {
                                var x = document.getElementById("password");
                                var y = document.getElementById("conpass");
                                if (x.type === "password" && y.type === "password") {
                                    x.type = "text";
                                    y.type = "text";
                                } else {
                                    x.type = "password";
                                    y.type = "password";
                                }
                            }
                        </script>
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