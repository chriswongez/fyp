<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>
    <link rel="stylesheet" href="./css/mainpage.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
    .jumbo {
        background-image: url('./images/ico.png');
        background-size: 30%;
        background-position-x: 85%;
        background-repeat: no-repeat;
    }
    </style>

</head>

<body>
    <?php include "./navbar.php"; ?>

    <script>
    window.onload = () => {
        document.getElementById("about-btn").classList.add("active");
    };
    </script>

    <main role="main ">
        <div class="jumbo jumbotron mt-5">
            <div class="container">
                <h1 class="display-3">About Foodie</h1>

            </div>
        </div>
        <hr>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="container d-inline-block align-item-middle py-5 bg-secondary rounded-lg">

                            <h1 class="text-white">Our</h1>
                            <h1 class="text-white">Mission</h1>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="container h-100 align-item-middle pt-5 bg-light rounded-lg">

                            <p class="">The project aimed is to developing an order system that can be used
                                in
                                the small medium enterprise food & beverages industries which can help
                                the restaurants to simplified their entire daily operational task as
                                well as improve the dining experience of customers.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">

                <p class="text-center display-4">Meet Our Team</p>
                <div class="row">
                    <div class="col-4 px-3">
                        <div class="bg-light border rounded-lg ">
                            <div class="container">
                                <p>
                                <h4 class="text-center">Chris Wong</h4>
                                </p>
                                <p>Founder & Project Manager</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in diam euismod,
                                    malesuada turpis nec, accumsan mauris.
                                </p>
                                <p>Email: chriswongez@gmail.com</p>
                                <p>Instagram: chriswong_31</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 px-3">
                        <div class="bg-light border rounded-lg ">
                            <div class="container">
                                <p>
                                <h4 class="text-center">Alvin Cheng</h4>
                                </p>
                                <p>Designer & Developer</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in diam euismod,
                                    malesuada turpis nec, accumsan mauris.
                                </p>
                                <p>Email: cheng200126@gmail.com</p>
                                <p>Instagram: alvincheng0526</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 px-3">
                        <div class="bg-light border rounded-lg ">
                            <div class="container">
                                <p>
                                <h4 class="text-center">Low Zhen Chao</h4>
                                </p>
                                <p>Developer & Resource Manager</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In in diam euismod,
                                    malesuada turpis nec, accumsan mauris.
                                </p>
                                <p>Email: zhenchao2013@gmail.com</p>
                                <p>Instagram: lowzc1213</p>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
            <div class="py-5"></div>
        </div>
    </main>
</body>

</html>
<?php
include('./php/footer.php');
?>