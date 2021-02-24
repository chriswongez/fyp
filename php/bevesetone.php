<?php
session_start();
$_SESSION['bevebutton'] = $_POST['clicked'];

echo $_SESSION['bevebutton'];