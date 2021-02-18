<?php
session_start();
require('./php/dbconnect.php');

if (isset($_GET['orderid'])) {
  $orderID = $_GET['orderid'];
}

if (isset($_POST['sendreceipt'])) {
  $to = $email;
  $subject = "Reset your password for Foodie";
  $message = "<p>We received a password reset request. The link to reset your is below. If you did not make this request, you can ignore this message</p>
        <p>Here is your password reset link <br>
        <a href='" . $url . "'>" . $url . "</a></p>";

  $headers = "From: Foodie Admin <foodieteam2021@gmail.com>\r\n";
  $headers .= "Reply-To: foodieteam2021@gmail.com\r\n";
  $headers .= "Content-type: text/html\r\n";

  mail($to, $subject, $message, $headers);
}

?>
<script>
function test(box) {
    var printContents = document.getElementById(box).innerHTML;
}
</script>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Receipt</title>
    <!-- <link rel="stylesheet" href="./css/receipt.css" /> -->
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/receipt.css">
    <script src="./js/jquery-3.5.1.min.js"></script>
</head>

<body>

    <button class="btn" type="button" id="sendreceipt">Send receipt to your
        E-mail</button>


    <div id="box">
        <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

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
        .btn {
            position: absolute;
            top: 2%;
            right: 2%;

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
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="images/logo.png" style="width: 120px; max-width: 300px" />
                                </td>

                                <td>
                                    Order ID: <?php echo $orderID; ?><br />
                                    Created: <?php echo $_SESSION['date']; ?><br />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Foodie<br />
                                    Multimedia University (MMU) Melaka Campus<br />
                                    Jalan Ayer Keroh Lama,<br />
                                    75450 Bukit Beruang, Melaka
                                </td>

                                <td>
                                    <?php echo $_SESSION['first'] . " " . $_SESSION['last']; ?><br />
                                    <?php echo $_SESSION['email']; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="details">
                    <td>Order Method</td>
                    <?php
          if ($_SESSION['setmethod'] == 'delivery') { ?>
                    <td>Delivery</td>
                    <?php
          } else if ($_SESSION['setmethod'] == 'selfc') { ?>
                    <td>Self Collect</td>
                    <?php } ?>
                </tr>

                <tr class="heading">
                    <td>Item</td>

                    <td>Price</td>
                </tr>

                <?php

        if (!empty($_SESSION["cart"])) {
          foreach ($_SESSION["cart"] as $product) {
        ?>
                <tr class="item">
                    <td><?php echo $product["name"]; ?></td>

                    <td><span
                            class="price"><?php echo "RM " . number_format((float)($product["price"] * $product["quantity"]), 2, '.', ''); ?></span>
                    </td>
                </tr>

                <?php
          }
        }

        if ($_SESSION['setmethod'] == 'delivery') { ?>
                <tr class="item">
                    <td style="color: blue;">Delivery Fee</td>

                    <td><span class="price">RM 10.00</span>
                    </td>
                </tr>
                <?php
        }
        ?>

                <tr class="total">
                    <td></td>

                    <td><?php echo "RM " . number_format((float)($_SESSION['totalprice']), 2, '.', ''); ?></td>
                </tr>
            </table>
            <p>For more inquiries, please contace foodieteam2021@gmail.com</p>
        </div>
    </div>
</body>

</html>

<script>
var email = "<?php echo $_SESSION['email']; ?>"
$("#sendreceipt").on("click", function() {
    $("#sendreceipt").text("Sending");
    var html = $("#box").html();
    $.ajax({
        type: "POST",
        url: "./sendreceipt.php",
        data: {
            receipt: html,
        },
        success: () => {
            $("#sendreceipt").text("Sent!");
            alert("The receipt has been sent to your email: " + email + "!");
        }
    });
});
</script>