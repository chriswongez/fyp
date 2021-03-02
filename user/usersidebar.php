<style>
    /* The sidebar menu */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .sidenav {
        height: 100%;
        /* Full-height: remove this if you want "auto" height */
        width: 240px;
        /* Set the width of the sidebar */
        position: fixed;
        /* Fixed Sidebar (stay in place on scroll) */
        z-index: 1;
        /* Stay on top */
        top: 0;
        /* Stay at the top */
        left: 0;
        background-color: #111;
        /* Black */
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 20px;

    }

    /* The navigation menu links */
    .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        transition: all 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
        color: #f1f1f1;

    }

    .button {
        background-color: #008cba;
    }

    button {
        border: none;
        color: white;
        padding: 20px 32px;
        text-align: center;
        text-decoration: none;
        display: outline-block;
        font-size: 16px;
        margin: 10px 8px;
        cursor: pointer;
    }

    header {
        color: white;
        font-size: 40px;
        text-align: center;
        padding: 18px 20px;
        margin-bottom: 5px;
        cursor: pointer;
        transition: all 0.3s;
    }

    header:hover {
        padding-left: 25px;
    }

    .sidenav p {
        color: white;
        margin: 0 1.0rem;
        font-size: 16pt;
    }

    .sidenav span {
        color: white;
        margin-left: 1.0rem;
        font-size: 12pt;
        text-indent: 10px;
    }
</style>

<head>
    <script src="https://use.fontawesome.com/37d1b5f99d.js"></script>

</head>

<div class="sidenav sidebar col-2">

    <header onclick="location.href ='../'">
        <span style="color: White;font-size:30px; ">
            <i class="fa fa-home pull-left" aria-hidden="true"> Foodie</i>
        </span>
    </header>

    <p>Logged as - </p>
    <span> <?php
            echo $_SESSION['username'];
            ?></span>
    <a href="./index.php">User Information</a>
    <a href="./order_history.php">Order History</a>
    <a href="./account_info.php">Change Password</a>
    <button class="btn btn-secondary btn-lg" onclick="location.href ='../logout.php'">Log out</button>

</div>