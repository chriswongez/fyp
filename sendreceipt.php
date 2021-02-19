<?php
session_start();

if (isset($_POST["receipt"])) {
    $receipt = $_POST["receipt"];
    $to = $_SESSION['email'];
    $subject = "Thank you for your order. Here is your receipt";
    $message = $receipt;
    $message .= "<br/>Cheers,<br/>Foodie Team";

    $headers = "From: Foodie Admin <foodieteam2021@gmail.com>\r\n";
    $headers .= "Reply-To: foodieteam2021@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";
    $headers .= "MIME-Version: 1.0\r\n";

    mail($to, $subject, $message, $headers);
}
