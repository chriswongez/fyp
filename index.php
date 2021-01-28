<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="./css/mainpage.css" />
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <!-- Preloader -->

    <!--End Preloader -->
    <?php include "./navbar.php"; ?>

    <script>
        window.onload = () => {
            document.getElementById("home-btn").classList.add("active");
        };
    </script>

    <section id="home">
        <h1 class="main-odering">Welcome to Foodie</h1>
        <p>
            Discover Restaurants<br />
            That deliver near You
        </p>
        <div class="btn-con">
            <form method="get" action="./menu.php">
                <button class="btn">Order Now</button>
            </form>
        </div>
    </section>

    <section id="services-container">
        <h1 class="main-services">
            <span style="font-size: 24pt; animation: colorRotate 6s linear 0s infinite">-INTRODUCING-</span><br />Our
            Special
            Burger
        </h1>
        <div class="services">
            <div class="box">
                <img src="images/spicy_beef_burger.jpg" alt="" />
                <h2 class="main-secondary center">-SPICY BEEF BURGER-</h2>
                <p style="
              text-align: center;
              font-size: 15pt;
              font-family: fantasy;
              color: black;
            ">
                    A wonderful burger that shows what can result from thinking just a
                    little bit differently. Choose the best-quality lean meat you can,
                    be brave and have fun experimenting with combinations of
                    ingredients.
                </p>
            </div>

            <div class="box">
                <img src="images/Fatty_buger.jpg" alt="" />
                <h2 class="main-secondary center">-FATTY BURGER-</h2>
                <p style="
              text-align: center;
              font-size: 15pt;
              font-family: fantasy;
              color: black;
            ">
                    A double layer of sear-sizzled 100% pure beef mingled with special
                    sauce on a sesame seed bun and topped with melty American cheese,
                    crisp lettuce, minced onions and tangy pickles.
                </p>
            </div>

            <div class="box">
                <img src="images/cheesy-double-chicken-burger.png" alt="" />
                <h2 class="main-secondary center">-DOUBLE CHICKEN CHEESE BURGER-</h2>
                <p style="
              text-align: center;
              font-size: 15pt;
              font-family: fantasy;
              color: black;
            ">
                    The Double Chicken Cheese Burger consists of two tender chicken
                    patties, paired with special cheese and vegetables.
                </p>
            </div>
        </div>
    </section>

    <section id="client-section">
        <h1 class="main-services" style="color: white">Our Clients</h1>
        <div id="clients">
            <div class="client-item">
                <img src="images/logo.png" alt="logo" />
            </div>

            <div class="client-item">
                <img src="images/Deep rock.png" alt="" />
            </div>

            <div class="client-item">
                <img src="images/Burger snack.png" alt="" />
            </div>
        </div>
    </section>

    <section id="contact">
        <h1 class="main-services" style="color: white">Contact Us</h1>
        <div class="contact-box">
            <form action="">
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" />
                </div>

                <div class="form-group">
                    <label for="email">Email :</label>
                    <input type="email" name="name" id="email" placeholder="Enter your email" />
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number :</label>
                    <input type="phone" name="name" id="phone" placeholder="Enter your phone number" />
                </div>

                <div class="form-group">
                    <label for="message">Message :</label>
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </div>
                <input type="submit" value="Submit" />
            </form>
        </div>
    </section>

    <footer>
        <div class="center">copyright&copy;www.FOS.com.All right reserved!</div>
    </footer>
</body>

</html>