<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['userlevel'])) {
    unset($_SESSION["username"]);
    unset($_SESSION["userlevel"]);
    header("Location: ./index.php");
}