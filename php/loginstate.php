<?php
if (empty($_SESSION['username']) && empty($_SESSION['userlevel'])) { //check login status
    echo "<script>
    alert('You are not logged in!\\nRedirecting you to login page...');
    window.location.href = './login.php';
    </script>";
    exit;
}