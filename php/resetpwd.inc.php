<?php
require('dbconnect.php');

if (isset($_POST['reset-submit'])) {
    $validator = $_POST['validator'];
    if ($_POST['pwd'] != $_POST['conpwd']) {
        header("Location: ../newpassword.php?validator=" . $validator . "&status=pwdxmatch");
    } else if ($_POST['pwd'] == $_POST['conpwd']) {
        $query = "SELECT userID from users";
        $result = mysqli_query($con, $query);;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($validator == md5(bin2hex($row['userID']))) {
                $userID = $row['userID'];
                break;
            }
        }

        $pass = $_POST['pwd'];
        $query = "UPDATE users SET userpass='$pass' where userID='$userID'";
        $result = mysqli_query($con, $query);
        if ($result) {
            header("Location: ../newpassword.php?validator=" . $validator . "&status=success");
        }
    }
} else
    header("Location: ./index.php");