<?php
require("dbconnect.php");

if (isset($_POST['reset-submit'])) {

    $email = $_POST['email'];
    $query = "SELECT * from users where useremail='$email'";
    $result = mysqli_query($con, $query);
    $rownum = mysqli_num_rows($result);

    if ($rownum != 1) {
        header("Location: ../resetpassword.php?reset=noemail");
        exit();
    } else if ($rownum == 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["userID"];
        $url = "localhost/fyp/newpassword.php?validator=" . md5(bin2hex($id));

        $to = $email;
        $subject = "Reset your password for Foodie";
        $message = "<p>We received a password reset request. The link to reset your is below. If you did not make this request, you can ignore this message</p>
        <p>Here is your password reset link <br>
        <a href='" . $url . "'>" . $url . "</a></p>";

        $headers = "From: Foodie Admin <foodieteam2021@gmail.com>\r\n";
        $headers .= "Reply-To: foodieteam2021@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        header("Location: ../resetpassword.php?reset=success");
        exit();
    } else {
        echo "<script>alert('Some error occured!')</script>";
        header("Location: ./index.php");
    }



    header("Location: ../resetpassword.php?reset=success");
} else {
    header("Location: ./index.php");
}