<?php
session_start();
require './php/dbconnect.php';

if (isset($_GET['orderid'])) {
    $orderID = $_GET['orderid'];
}
if (isset($_POST['return']) || isset($_POST['orderhistory'])) {
    unset($_SESSION["cart"]);
    unset($_SESSION["menustat"]);
    unset($_SESSION['setmethod']);
    unset($_SESSION['setvalue']);
    unset($_SESSION['totalprice']);
    unset($_SESSION['date']);
    unset($_SESSION['email']);
    unset($_SESSION['first']);
    unset($_SESSION['last']);
    if (isset($_POST['return']))
        header("Location: ./index.php");
    else if (isset($_POST['orderhistory']))
        header("Location: ./user/userorderdetail.php?id=" . $orderID);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Receipt</title>
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <script src="./js/jquery-3.5.1.min.js"></script>
</head>

<body>
    <div id="box">
        <style>
            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }

            /** RTL **/
            .rtl {
                direction: rtl;
                font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial,
                    sans-serif;
            }

            .rtl table {
                text-align: right;
            }

            .rtl table tr td:nth-child(2) {
                text-align: left;
            }

            /* button */
            .btn-wrap {
                display: flex;
                width: 600px;
                margin: auto;
            }

            .btn {
                cursor: pointer;
                position: relative;

                display: block;
                margin: 30px auto;
                padding: 0;

                overflow: hidden;

                border-width: 0;
                outline: none;
                border-radius: 2px;
                box-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);

                background-color: #2ecc71;
                color: #ecf0f1;

                transition: background-color 0.3s;
            }

            .btn:hover,
            .btn:focus {
                background-color: #27ae60;
            }

            .btn>* {
                position: relative;
            }

            .btn {
                display: block;
                padding: 12px 24px;
            }

            .btn:before {
                content: "";

                position: absolute;
                top: 50%;
                left: 50%;

                display: block;
                width: 0;
                padding-top: 0;

                border-radius: 100%;

                background-color: rgba(236, 240, 241, 0.3);

                -webkit-transform: translate(-50%, -50%);
                -moz-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                -o-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }

            .btn:active:before {
                width: 120%;
                padding-top: 120%;

                transition: width 0.2s ease-out, padding-top 0.2s ease-out;
            }
        </style>
        <div class="invoice-box" style="max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: ' Helvetica Neue', 'Helvetica' , Helvetica, Arial, sans-serif; color: #555;">
            <table cellpadding="0" cellspacing="0" style="width: 100%;
            line-height: inherit;
            text-align: left;">
                <tr class="top">
                    <td colspan="2">

                <tr>
                    <td style="padding: 5px;
            vertical-align: top;padding-bottom: 20px;font-size: 45px;
            line-height: 45px;
            color: #333;" class="title">
                        <img src="https://i.ibb.co/tMZ8R4h/logo.png" style="width: 120px; max-width: 300px" />
                    </td>

                    <td style="padding: 5px;
            vertical-align: top;text-align: right;padding-bottom: 20px;">
                        Order ID: <?php echo $orderID; ?><br />
                        Created: <?php echo $_SESSION['date']; ?><br />
                    </td>
                </tr>

                </td>
                </tr>

                <tr class="information">
                    <td style="padding: 5px;
            vertical-align: top;" colspan="2">

                <tr>
                    <td style="padding: 5px;
            vertical-align: top;padding-bottom: 40px;">
                        Foodie<br />
                        Multimedia University (MMU) Melaka Campus<br />
                        Jalan Ayer Keroh Lama,<br />
                        75450 Bukit Beruang, Melaka
                    </td>

                    <td style="padding: 5px;
            vertical-align: top;text-align: right;padding-bottom: 40px;">
                        <?php echo $_SESSION['first'] . " " . $_SESSION['last']; ?><br />
                        <?php echo $_SESSION['email']; ?>
                    </td>
                </tr>

                </td>
                </tr>

                <tr class="details">
                    <td style="padding: 5px;
            vertical-align: top;padding-bottom: 20px;">Order Method</td>
                    <?php
                    if ($_SESSION['setmethod'] == 'delivery') { ?>
                        <td style="padding: 5px;
            vertical-align: top;text-align: right;padding-bottom: 20px;">Delivery</td>
                    <?php
                    } else if ($_SESSION['setmethod'] == 'selfc') { ?>
                        <td style="padding: 5px;
            vertical-align: top;text-align: right;padding-bottom: 20px;">Self Collect</td>
                    <?php } ?>
                </tr>

                <tr class="heading">
                    <td style="padding: 5px;
            vertical-align: top;background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;">Item</td>

                    <td style="padding: 5px;
            vertical-align: top;text-align: right;background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;">Price</td>
                </tr>

                <?php

                if (!empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $product) {
                ?>
                        <tr class="item">
                            <td style="padding: 5px;
            vertical-align: top;border-bottom: 1px solid #eee;"><?php echo $product["name"]; ?></td>

                            <td style="padding: 5px;
            vertical-align: top;text-align: right;border-bottom: 1px solid #eee;"><span class="price"><?php echo "RM " . number_format((float) ($product["price"] * $product["quantity"]), 2, '.', ''); ?></span>
                            </td>
                        </tr>

                    <?php
                    }
                }

                if ($_SESSION['setmethod'] == 'delivery') { ?>
                    <tr class="item">
                        <td style="padding: 5px;
            vertical-align: top;" style="color: blue;">Delivery Fee</td>

                        <td style="padding: 5px;
            vertical-align: top;text-align: right;"><span class="price">RM 10.00</span>
                        </td>
                    </tr>
                <?php
                }
                ?>

                <tr class="total">
                    <td style="padding: 5px;
            vertical-align: top;"></td>

                    <td style="padding: 5px;
            vertical-align: top;text-align: right;border-bottom: 2px solid #eee;
            font-weight: bold;">
                        <?php echo "RM " . number_format((float) ($_SESSION['totalprice']), 2, '.', ''); ?>
                    </td>
                </tr>
            </table>
            <p>For more inquiries, please contace foodieteam2021@gmail.com</p>
        </div>
    </div>
    <form method="post">
        <p style="color: red; text-align: center;" id="sendingnotes"></p>
        <div class="btn-wrap">
            <!-- <button class="btn" type="button" id="sendreceipt">Send receipt to your
                E-mail</button> -->
            <button class="btn" onclick="printreceipt()">Print Receipt</button>
            <button class="btn" type="submit" id="return" name="return">Return to Main Page</button>
            <button class="btn" type="submit" name="orderhistory">Go to Order History Page</button>
        </div>
    </form>
</body>

</html>
<script>
    function printreceipt() {
        var printContents = document.getElementById("box").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    var email = "<?php echo $_SESSION['email']; ?>"
    $(document).ready(function() {
        var html = $("#box").html();
        $.ajax({
            type: "POST",
            url: "./sendreceipt.php",
            data: {
                receipt: html,
            },
            success: () => {}
        });
    });
</script>