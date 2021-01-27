<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['userlevel'])) {
    unset($_SESSION["username"]);
    unset($_SESSION["userlevel"]);
    unset($_SESSION["cart"]);
    unset($_SESSION["menustat"]);
    header("Location: ./index.php");
}