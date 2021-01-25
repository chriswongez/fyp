<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="./css/cart.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Preloader -->

    <!--End Preloader -->
    <?php include "./navbar.php"; ?>

    <section id="home">
        <h1 class="main-odering">CART PRODUCTS</h1>
    </section>

    <!--Cart section-->
    <!--Cart Section-->
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
                        <tbody>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="main">
                                        <div class="d-flex">
                                            <!--W=145 H=98--> <img src="images/spicy_beef_burger.jpg" alt=""
                                                style="width:145px" style="height:98px">
                                        </div>
                                        <div class="des">
                                            <p>lorem ipsum</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6>RM 12.00</h6>
                                </td>
                                <td>
                                    <div class="counter">
                                        <i class="fas fa-angle-down"></i>
                                        <input class="input-number" type="text" value="1" min="0" max="10">
                                        <i class="fas fa-angle-up"></i>
                                    </div>
                                </td>
                                <td>
                                    <h6>RM 12.00</h6>
                                </td>
                            </tr>
                            <!----->
                            <tr>
                                <td>
                                    <div class="main">
                                        <div class="d-flex">
                                            <img src="images/cheesy-double-chicken-burger.png" alt=""
                                                style="width: 145px" height="98px">
                                        </div>
                                        <div class="des">
                                            <p>Cheess double Chiken Burger</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6>RM15.00</h6>
                                </td>
                                <td>
                                    <div class="counter">
                                        <i class="fas fa-angle-down"></i>
                                        <input class="input-number" type="text" value="1" min="0" max="10">
                                        <i class="fas fa-angle-up"></i>
                                    </div>
                                </td>
                                <td>
                                    <h5>RM15.00</h5>
                                </td>
                            </tr>
                            <!---->
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
                <li class="cart-total">Total
                    <span>RM 28.00</span>
                </li>
            </ul>
            <a href="#" class="proceed-btn"> Proceed to Checkout</a>
        </div>
    </div>