<?php
session_start();
unset($_SESSION['setmethod']);
unset($_SESSION['setvalue']);
header('Location: ../menu.php');