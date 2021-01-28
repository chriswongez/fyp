<style>
/* navbar */
.nav-con {
    width: 98%;
    position: fixed;

    left: 50%;
    top: 10px;
    transform: translateX(-50%);
    margin: 0 auto;
    z-index: 3;
    box-sizing: unset;
}

nav {
    background-color: white;
    overflow: auto;
    box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    border-radius: 5px;
}

nav ul {
    padding: 0;
    margin: 0 0 0 150px;
    list-style: none;
}

nav li {
    float: right;
}

.logo {
    position: absolute;
    display: inline-block;
    top: 50%;
    transform: translateY(-50%);
    height: 100%;
    border-radius: 5px;
}

.logo:hover {
    background-color: gray;
    border-radius: 5px;
    transition: 0.5s;
}

nav a {
    width: 115px;
    display: block;
    padding: 15px 10px;
    font-size: 14pt;
    text-decoration: none;
    font-family: Arial;
    color: black;

    text-align: center;
    border-radius: 5px;
    cursor: pointer;
}

.active {
    text-decoration: underline;
}

nav a:hover {
    background-color: rgba(0, 0, 0, 0.2);
    color: black;
    transition: 0.5s;
    border-radius: 5px;
}

#cart-num {
    color: red;
}

.dropdown-content {
    /* display: none; */
    visibility: hidden;
    opacity: 0;
    position: absolute;
}



.dropdown-btn:hover .dropdown-content {
    /* display: block; */
    border-radius: 0 0 5px 5px;
    visibility: visible;
    opacity: 1;
    transition: all 0.3s;
    background-color: white;

}

nav li #acc-drop-btn {
    float: none;
    background-color: white;
}

nav li #acc-drop-btn {
    border-radius: 0;
}

nav li #acc-drop-btn:last-child {
    border-radius: 0 0 5px 5px;
}

nav li #acc-drop-btn:hover {
    color: black;
    box-shadow: none;
    background-color: rgba(0, 0, 0, 0.2);

}

/* navbar */
</style>

<?php
if (!empty($_SESSION['cart'])) { //count cart item
    $cart_count = "(" . count(array_keys($_SESSION['cart'])) . ")";
} else
    $cart_count = "";
?>
<header>
    <div class="nav-con">
        <a href="./index.php"><img src="images/logo.png" class="logo" /></a>
        <nav>
            <ul>
                <?php
                if (isset($_SESSION['username']) && isset($_SESSION['userlevel'])) { //check login state then show cart cart
                    echo "<li><a id='cart-btn' href='./cart.php'>Cart <span id='cart-num'>" . $cart_count  . "</span> </a></li>";
                } else {
                    echo "<li><a id='cart-btn' onclick='nologin()'>Cart <span id='cart-num'>" . $cart_count  . "</span> </a></li>";
                }
                ?>

                <?php //check login state and change the login button to user/admin button
                if (isset($_SESSION['username']) && isset($_SESSION['userlevel']) && $_SESSION['userlevel'] == "user") {

                    echo "<li class='dropdown-btn'><a id='acc-btn'>Account</a>
                    <div class='dropdown-content'>
                        <a id='acc-drop-btn' href=''>Account</a>
                        <a id='acc-drop-btn' href='logout.php'>Logout</a>
                    </div>
                </li>";
                } else if (isset($_SESSION['username']) && isset($_SESSION['userlevel']) && $_SESSION['userlevel'] == "admin") {

                    echo "<li class='dropdown-btn'><a id='acc-btn'>Account</a>
                    <div class='dropdown-content'>
                        <a id='acc-drop-btn' href=''>Admin Panel</a>
                        <a id='acc-drop-btn' href='logout.php'>Logout</a>
                    </div>
                </li>";
                } else {
                    echo "<li><a id='login-btn' href='userlogin.php'>Login</a></li>";
                }

                ?>
                <li><a id="menu-btn" href="./menu.php">Menu</a></li>
                <li><a id="home-btn" href="./index.php">Home</a></li>
                <?php
                if (isset($_SESSION['username']) && isset($_SESSION['userlevel'])) {
                    echo "<li><a style='width: auto; cursor: auto;'>Welcome, " . $_SESSION['username'] . "</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</header>

<script>
function nologin() { //if not login redirect login page
    alert("You are not logged in!\nRedirecting you to login page...");
    window.location.href = "./userlogin.php";
}
</script>