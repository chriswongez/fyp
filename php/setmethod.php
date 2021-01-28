<?php
session_start();
$_SESSION['setmethod'] = $_POST['store'];
$_SESSION['setvalue'] = $_POST['value'];