<?php
if (empty($_SESSION['username']) && empty($_SESSION['userlevel'])) {
    //check login status
    echo "<script>
alert('You are not logged in!\\nRedirecting you to login page...');
    window.location.href='../login.php';
    </script>";
    exit;
}
if ($_SESSION['userlevel'] != 'admin') {
    //check admin status
    echo "<script>
    alert('You are not an admin!\\nLogging you out and redirecting you to main page...');
    window.location.href='../logout.php';
    </script>";
    exit;
}
?>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&display=swap");

    .title {
        font-family: "Poppins", sans-serif;
    }

    :root {
        --main-color: #027581;
        --color-dark: #1d2231;
        --text-grey: #8390a2;
    }

    * {
        font-family: "poppins", sans-serif;
        margin: 0;
        padding: 0;
        text-decoration: none;
        list-style-type: none;
        box-sizing: border-box;
    }

    .fas fa-columns {
        left: 0;
    }

    .sidebar {
        height: 100%;
        width: 260px;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 100;
        background: var(--main-color);
        color: #fff;
        overflow-y: auto;
    }

    .sidebar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 60px;
        padding: 0rem 1rem;
    }

    .sidebar-menu {
        padding: 1rem;
    }

    .sidebar li {
        margin-bottom: 1.2rem;
    }

    .sidebar a {
        color: #fff;
        font-size: 0.9rem;
        transition: padding-left 0.3s;
    }

    .sidebar a:hover {
        padding-left: 0.7rem;
    }

    .sidebar a span:last-child {
        padding-left: 0.6rem;
    }
</style>

<div class="sidebar col-2">
    <div class="sidebar-header">
        <a href="../index.php">
            <h3 class="brand">
                <span style="color: White;font-size:30px; ">
                    <i class="fa fa-home pull-left" aria-hidden="true"> <span class="title">Foodie</span></i>
                </span>
            </h3>
        </a>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="index.php">
                    <i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="products.php">
                    <i class="fas fa-hamburger"></i>
                    <span>Product details</span>
                </a>
            </li>

            <li>
                <a href="customer_orders.php">
                    <i class="fas fa-concierge-bell"></i>
                    <span>Order Management</span>
                </a>
            </li>

            <li>
                <a href="contactus.php">
                    <i class="fas fa-paper-plane"></i>
                    <span>Contact us</span>
                </a>
            </li>


            <li>
                <a href="user.php">
                    <i class="fas fa-user-circle"></i>
                    <span>User Management</span>
                </a>
            </li>

            <li>
                <a href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Log out</span>
                </a>
            </li>
        </ul>
    </div>
</div>



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hello <?php echo $_SESSION["username"]; ?></h1>
    </div>