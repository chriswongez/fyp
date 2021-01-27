<?php
session_start();
$_SESSION['menustat'] = $_POST['clicked'];
echo $_SESSION['menustat'];