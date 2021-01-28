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
        width: 240px;
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
    }

    .sidebar a span:last-child {
        padding-left: 0.6rem;
    }
</style>

<div class="sidebar">
    <div class="sidebar-header">
        <h3 class="brand">
            <span class="title">Foodie</span>
            <i class="fas fa-bars"></i>
        </h3>
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