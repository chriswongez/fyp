<div class="sidebar">
    <div class="sidebar-header">
        <h3 class="brand">
            <span class="title">Foodie</span>
            <i class="fas fa-bars"></i>
        </h3>
    </div>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <?php
            if (isset($_SESSION['admin_id'])) {
            ?>
                <a class="nav-link" href="../admin/admin-logout.php">Sign out</a>
                <?php
            } else {
                $uriAr = explode("/", $_SERVER['REQUEST_URI']);
                $page = end($uriAr);
                if ($page === "login.php") {
                ?>
                    <a class="nav-link" href="../admin/register.php">Register</a>
                <?php
                } else {
                ?>
                    <a class="nav-link" href="../admin/login.php">Login</a>
            <?php
                }
            }

            ?>

        </li>
    </ul>
    </nav>