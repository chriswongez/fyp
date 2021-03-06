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
        $userfirst = $row['userfirst'];
        $userlast = $row['userlast'];
        $usercontact = $row['usercontact'];
        $userAdd = $row['userAdd'];
        $userCity = $row['userCity'];
        $userState = $row['userState'];
        $userZip = $row['userZip'];
        $username = $row['username'];
        $userEmail = $row['useremail'];
    }
}

if (isset($_POST['save']) && $_POST['save'] == 1) {
    $userfirst = $_POST['first_name'];
    $userlast = $_POST['last_name'];
    $usercontact = $_POST['contact'];
    $userAdd = $_POST['address'];
    $userCity = $_POST['city'];
    $userState = $_POST['state'];
    $userZip = $_POST['zip'];
    $newusername = stripslashes($_REQUEST['username']);
    $newusername = mysqli_real_escape_string($con, $newusername);
    $newemail = stripslashes($_REQUEST['email']);
    $newemail = mysqli_real_escape_string($con, $newemail);

    $query = "SELECT * FROM users WHERE username='$newusername' AND username!='$username'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);
    $query = "SELECT * FROM users WHERE useremail='$newemail' AND useremail!='$userEmail'";
    $result = mysqli_query($con, $query);
    $rowss = mysqli_num_rows($result);
    if ($rows >= 1) { //check username in use
        echo "<script>
        alert('Username in used!\\nPlease try again.');
        window.location.href='./index.php';
        </script>";
        exit;
    } else if ($rowss >= 1) { //check email in use
        echo "<script>
        alert('Email in used!\\nPlease try again.');
        window.location.href='./index.php';
        </script>";
        exit;
    } else {
        $query = "UPDATE users SET userfirst = '$userfirst', userlast = '$userlast', usercontact = '$usercontact', userAdd = '$userAdd', userCity = '$userCity', userState = '$userState', userZip = '$userZip',username = '$newusername', useremail = '$newemail' WHERE userID = '$userID';";
        $result = mysqli_query($con, $query);
        if ($result) {
            $_SESSION['username'] = $newusername;
            echo "<script>
            alert('Your information is saved');
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./include/header.php');
    ?>
    <title>User Information</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        include('./usersidebar.php');
        ?>

        <div class="container-fluid">

            <div class="row">
                <div class="col-10">

                    <span class="display-1 ">User Information</span>
                    <hr>
                    <h5>Edit your personal information</h5>
                    <hr>
                </div>
            </div>
            <div class="row">
                <!--/col-3-->
                <div class="col-sm-12">
                    <form class="form" action="##" method="post" id="registrationForm">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>First name</h4>
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="<?php echo $userfirst ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Last name</h4>
                                </label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $userlast ?>" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>E-mail</h4>
                                </label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $userEmail ?>" aria-describedby="emailHelp" required>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h4>Username</h4>
                                </label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Contact</h4>
                                </label>
                                <input type="text" class="form-control" name="contact" id="contact" placeholder="0123456789" value="<?php echo $usercontact ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Address</h4>
                                </label>
                                <textarea class="form-control" id="address" name="address" rows="3" required><?php echo $userAdd ?></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>City</h4>
                                </label>
                                <input type="text" class="form-control" name="city" placeholder="Enter city" value="<?php echo $userCity ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>State</h4>
                                </label>
                                <input type="text" class="form-control" name="state" placeholder="Enter state" value="<?php echo $userState ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Postcode</h4>
                                </label>
                                <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter Zip" value="<?php echo $userZip ?>" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br />
                                <input type="hidden" name="save" value="1">
                                <button class="btn btn-lg btn-success" type="submit">
                                    <i class="glyphicon glyphicon-ok-sign"></i> Save
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
                <!--/tab-content-->
            </div>

            <!--/col-9-->
        </div>
        <!--/row-->
    </main>
</body>

</html>

<?php
include('./include/footer.php');
?>