<?php
session_start();
$status = "";
if (empty($_SESSION['username']) && empty($_SESSION['userlevel'])) { //check login status
    echo "<script>
    alert('You are not logged in!\\nRedirecting you to login page...');
    window.location.href = './userlogin.php';
    </script>";
}

if (empty($_SESSION["cart"])) {
    echo "<script>
    alert('Your cart is empty! Please choose at least one item');
    window.location.href='./menu.php';
    </script>";
}
if (isset($_POST['clearall'])) {
    unset($_SESSION["cart"]);
    unset($_SESSION["menustat"]);
    echo "<script>
    window.location.href='./menu.php';
    </script>";
    exit;
}

if (isset($_POST['action']) && $_POST['action'] == "remove") { //remove item from cart
    if (!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            if ($_POST["code"] == $key) {
                unset($_SESSION["cart"][$key]);
                $status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
            }
            if (empty($_SESSION["cart"]))
                unset($_SESSION["cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") { //change the quantity of the product
    foreach ($_SESSION["cart"] as &$value) {
        $_SESSION["debug"] = $value;
        if ($value['productCode'] === $_POST["code"]) {
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }
}

if (isset($_POST['proceed']) && !empty($_SESSION["cart"])) { //check cart item, if empty redirect to menu
    header('Location: ./checkout.php');
} else if (isset($_POST['proceed']) && empty($_SESSION["cart"])) {
    echo "<script>
    alert('Your cart is empty! Please choose at least one item');
    window.location.href='./menu.php';
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="./css/cart.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Preloader -->

    <!--End Preloader -->
    <?php include "./navbar.php"; ?>

    <script>
    window.onload = () => {
        document.getElementById("cart-btn").classList.add("active");
    };
    </script>

    <section id="home">
        <h1 class="main-odering">CART PRODUCTS</h1>

    </section>

    <!--Cart section-->
    <!--Cart Section-->
    <style>
    .clear-btn-form {
        position: fixed;
        right: 2%;
        top: 90%;
    }

    .clear-btn {
        padding: 5px 20px;
        margin: 10px;
        background-color: white;
        border: 1px black solid;
        border-radius: 10px;
        transition: all 0.3s;
        box-shadow: 2px 2px 2px black;
    }

    .clear-btn:hover {
        color: white;
        background-color: red;
    }

    .go-back-btn {
        position: fixed;
        left: 2%;
        top: 90%;
        padding: 5px 20px;
        margin: 10px;
        background-color: white;
        border: 1px black solid;
        border-radius: 10px;
        transition: all 0.3s;
        box-shadow: -2px 2px 2px black;
    }

    .go-back-btn:hover {
        color: black;
        background-color: lightblue;
    }
    </style>
    <?php
    if (!empty($_SESSION["cart"])) {
        echo "<form class='clear-btn-form' method='post'>
        <input type='hidden' name='clearall'>
        <input class='clear-btn' type='submit' value='Clear all item in the cart'>
    </form>";
    }
    ?>

    <button class="go-back-btn" onclick="location.href = './menu.php';">Go Back to Menu</button>


    <section class="mt-5">

        <div class="container">
            <div class="cart">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-white">Product</th>
                                <th scope="col" class="text-white">Price</th>
                                <th scope="col" class="text-white">Quantity</th>
                                <th scope="col" class="text-white">Total</th>
                            </tr>
                        </thead>
                        <tbody> <?php

                                if (!empty($_SESSION["cart"])) {
                                    foreach ($_SESSION["cart"] as $product) {
                                ?>


                            <!-- ----- -->
                            <tr>
                                <td>
                                    <div class="main" style="position: relative;">
                                        <div class="d-flex">
                                            <img src="./product/<?php echo $product["productImg"]; ?>" alt=""
                                                style="width:145px" style="height:98px">
                                        </div>
                                        <form method='post' style="position: absolute; right: 50px; top: 0;">
                                            <input type='hidden' name='code'
                                                value="<?php echo $product["productCode"]; ?>" />
                                            <input type='hidden' name='action' value="remove" />
                                            <button type='submit' class='remove'>Remove Item</button>
                                        </form>
                                        <div class="des">
                                            <p><?php echo $product["name"]; ?></p>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6><?php echo "RM " . $product["price"]; ?></h6>
                                </td>
                                <td>
                                    <div class="">
                                        <form method='post' action=''>
                                            <input type='hidden' name='code'
                                                value="<?php echo $product["productCode"]; ?>" />
                                            <input type='hidden' name='action' value="change" />
                                            <select name='quantity' class='quantity' onchange="this.form.submit()">
                                                <option <?php if ($product["quantity"] == 1) echo "selected"; ?>
                                                    value="1">1
                                                </option>
                                                <option <?php if ($product["quantity"] == 2) echo "selected"; ?>
                                                    value="2">2
                                                </option>
                                                <option <?php if ($product["quantity"] == 3) echo "selected"; ?>
                                                    value="3">3
                                                </option>
                                                <option <?php if ($product["quantity"] == 4) echo "selected"; ?>
                                                    value="4">4
                                                </option>
                                                <option <?php if ($product["quantity"] == 5) echo "selected"; ?>
                                                    value="5">5
                                                </option>
                                            </select>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <h6><?php echo "RM " . $product["price"] * $product["quantity"]; ?></h6>
                                </td>
                            </tr>
                            <?php
                                        if (empty($total_price)) {
                                            $total_price = 0;
                                            $total_price += ($product["price"] * $product["quantity"]);
                                        } else
                                            $total_price += ($product["price"] * $product["quantity"]);
                                    }
                                } else
                                    unset($_SESSION["debug"]);
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    <div class="col-lg-4 offset-lg-4">
        <div class="checkout">
            <ul>
                <li class="subtotal">subtotal
                    <span>RM 28.00</span>

                </li>
                <?php
                print_r($_SESSION["debug"]);
                ?>
                <li class="cart-total">Total

                    <?php
                    if (empty($total_price)) {
                        echo "<span>RM 0.00</span>";
                    } else
                        echo "<span>RM" . $total_price . "</span>";
                    ?>
                </li>
            </ul>
            <form method="post" style="width: 100%; overflow: auto  ;">
                <input type="submit" name="proceed" class="proceed-btn" value="Proceed to Checkout">
            </form>

        </div>
    </div>