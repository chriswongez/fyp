<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['userlevel'])) {
    unset($_SESSION["username"]);
    unset($_SESSION["userlevel"]);
    unset($_SESSION["cart"]);
    unset($_SESSION["menustat"]);
    echo "<script>
      alert('You have logged out.');
      window.location.href='./index.php';
      </script>";
}
?>