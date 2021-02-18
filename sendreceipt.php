<?php
session_start();

if (isset($_POST["receipt"])) {
    $receipt = $_POST["receipt"];
    $to = $_SESSION['email'];
    $subject = "Receipt";
    $message = $receipt;

    $headers = "From: Foodie Admin <foodieteam2021@gmail.com>\r\n";
    $headers .= "Reply-To: foodieteam2021@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);
}