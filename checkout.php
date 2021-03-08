<?php
session_start();
require('./php/dbconnect.php');
include('./php/loginstate.php');
if (!empty($_SESSION['cart'])) {
    $cart_count = "(" . count(array_keys($_SESSION['cart'])) . ")";
} else
    $cart_count = "";
if (isset($_SESSION['userID'])) {
    $userID = $_SESSION['userID'];
    $query = "SELECT * from users where userID = '$userID'";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $userfirst = $row['userfirst'];
        $userlast = $row['userlast'];
        $userAdd = $row['userAdd'];
        $userCity = $row['userCity'];
        $userState = $row['userState'];
        $userZip = $row['userZip'];
        $useremail = $row['useremail'];
        $usercontact = $row['usercontact'];
    }
}
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

    <h2>Checkout</h2>

    <div class="row">
        <div class="col-75">
            <div class="container">
                <form action="./php/proceedcheckout.php" method="POST">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="" value="<?php echo $userfirst ?>" required>
                            <label for="lname"><i class="fa fa-user"></i> Last Name</label>
                            <input type="text" id="lname" name="lastname" placeholder="" value="<?php echo $userlast ?>" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="abc123@exmaple.com" value="<?php echo $useremail ?>" required>
                            <label for="contact"><i class="fa fa-phone"></i> Contact Number</label>
                            <input type="text" id="contact" name="contact" placeholder="0123456789" value="<?php echo $usercontact ?>" required>
                            <?php
                            if ($_SESSION['setmethod'] == 'delivery') {
                                echo "<label for='adr'><i class='fa fa-address-card-o'></i> Address</label>
                                <input type='text' id='adr' name='address' placeholder='' value='" . $userAdd . "' required>
                                <label for='city'><i class='fa fa-institution'></i> City</label>
                                <input type='text' id='city' name='city' placeholder='' value='" . $userCity . "' required>
    
                                <div class='row'>
                                    <div class='col-50'>
                                        <label for='state'>State</label>
                                        <input type='text' id='state' name='state' placeholder='' value='" . $userState . "' required>
                                    </div>
                                    <div class='col-50'>
                                        <label for='zip'>Zip</label>
                                        <input type='text' id='zip' name='zip' placeholder='' value='" . $userZip . "' required>
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
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" placeholder="Only A-Z" pattern="^[A-Z ]+$" required>
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" placeholder="5xxxxxxxxxxxxxxx/4xxxxxxxxxxxxxxx" minlength="16" maxlength="16" pattern="[4-5]{1}[0-9]{3}[0-9]{4}[0-9]{4}[0-9]{4}" required>
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" placeholder="September" required>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" placeholder="2018" minlength="4" maxlength="4" required>
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV/CVV2</label>
                                    <input type="text" id="cvv" placeholder="352" minlength="3" maxlength="4" required>
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
                <table style="width: 100%;">

                    <?php

                    if (!empty($_SESSION["cart"])) {
                        foreach ($_SESSION["cart"] as $product) {
                    ?>
                            <tr>
                                <td style="width: 70%;">
                                    <div class="col"><?php echo $product["name"]; ?></div>
                                </td>
                                <td style="width: 30%; text-align: right;">
                                    <div class="col"><?php echo "RM " . number_format((float)($product["price"] * $product["quantity"]), 2, '.', ''); ?></div>
                                </td>
                            </tr>
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

                </table>
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
                    echo "<p style='color:red'>Note: Once you placed the order, you have 3 minute to cancel the order before the kitchen start preparing your food.<br><br>You can collect your food after 15 minutes.</p>";
                }

                $_SESSION['totalprice'] = $total_price;
                ?>

            </div>
        </div>
    </div>
    <?php
    include('./php/footer.php');
    ?>
</body>

</html>