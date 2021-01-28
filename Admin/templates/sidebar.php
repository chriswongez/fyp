<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">

            <?php


            $uri = $_SERVER['REQUEST_URI'];
            $uriAr = explode("/", $uri);
            $page = end($uriAr);

            ?>


            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="index.php">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="products">
                            <i class="fas fa-hamburger"></i>
                            <span>Product details</span>
                        </a>
                    </li>

                    <li>
                        <a href="customer_orders.php">
                            <i class="fas fa-concierge-bell"></i>
                            <span>Order details</span>
                        </a>
                    </li>

                    <li>
                        <a href="customers.php">
                            <i class="fas fa-user-circle"></i>
                            <span>User Management</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log out</span>
                        </a>
                    </li>
                </ul>
            </div>
    </div>
    </ul>


    </div>
</nav>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hello <?php echo $_SESSION["admin_name"]; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>