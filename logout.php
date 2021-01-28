<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['userlevel'])) {
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["cart"]);
  unset($_SESSION["menustat"]);
  unset($_SESSION['setmethod']);
  unset($_SESSION['setvalue']);
  echo "<script>
      alert('You have logged out.');
      window.location.href='./index.php';
      </script>";
}