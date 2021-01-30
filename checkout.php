<?php
session_start();
include('./php/loginstate.php');
if (!empty($_SESSION['cart'])) {
    $cart_count = "(" . count(array_keys($_SESSION['cart'])) . ")";
} else
    $cart_count = "";

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/checkout.css" />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
</head>

<body>

    <h2>Shopping Cart</h2>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="./php/proceedcheckout.php" method="POST">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="">
                            <label for="lname"><i class="fa fa-user"></i> Last Name</label>
                            <input type="text" id="lname" name="lastname" placeholder="">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="abc123@exmaple.com">
                            <label for="contact"><i class="fa fa-phone"></i> Contact Number</label>
                            <input type="text" id="contact" name="contact" placeholder="0123456789">
                            <?php
                            if ($_SESSION['setmethod'] == 'delivery') {
                                echo "<label for='adr'><i class='fa fa-address-card-o'></i> Address</label>
                                <input type='text' id='adr' name='address' placeholder='542 W. 15th Street'>
                                <label for='city'><i class='fa fa-institution'></i> City</label>
                                <input type='text' id='city' name='city' placeholder='New York'>
    
                                <div class='row'>
                                    <div class='col-50'>
                                        <label for='state'>State</label>
                                        <input type='text' id='state' name='state' placeholder='NY'>
                                    </div>
                                    <div class='col-50'>
                                        <label for='zip'>Zip</label>
                                        <input type='text' id='zip' name='zip' placeholder='10001'>
                                    </div>
                                </div>";
                            }
                            ?>

                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" placeholder="September">
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" placeholder="2018">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php
                    if ($_SESSION['setmethod'] == 'delivery') {
                        echo "<label>
                                <input type='checkbox' checked='checked' name='sameadr'> Shipping address same as billing
                            </label>";
                    }
                    ?>
                    <input type="hidden" name="set" value="set">
                    <input type="submit" value="Continue to checkout" class="btn">
                </form>
            </div>
        </div>

        <div class="col-25">
            <div class="container">
                <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i>
                        <b><?php echo $cart_count ?></b></span>
                </h4>
                <?php

                if (!empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $product) {
                ?>
                <p><a href="#"><?php echo $product["name"]; ?></a> <span
                        class="price"><?php echo "RM " . number_format((float)($product["price"] * $product["quantity"]), 2, '.', ''); ?></span>
                </p>
                <?php
                        if (empty($total_price)) {
                            $total_price = 0;
                            $total_price += ($product["price"] * $product["quantity"]);
                        } else
                            $total_price += ($product["price"] * $product["quantity"]);

                        if ($_SESSION['setmethod'] == 'delivery') {
                            $total_price += 10.00;
                        }
                    }
                }
                ?>

                <hr>
                <?php
                if ($_SESSION['setmethod'] == 'delivery') {
                    echo "<p>Delivery Fees : RM 10.00</p>";
                }
                if (empty($total_price)) {
                    echo "<span>RM 0.00</span>";
                } else
                    echo "<p>Total <span class='price' style='color:black'> <b>RM" . number_format((float)$total_price, 2, '.', '') . "</b></span></p>";
                if ($_SESSION['setmethod'] == 'selfc') {
                    echo "<p style='color:red'>Note: Your order will be start prepare and ready for self-collect once you clicked on the checkout button.</p>";
                }

                $_SESSION['totalprice'] = $total_price;
                ?>

            </div>
        </div>
    </div>

</body>

</html>