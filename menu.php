<script type="text/javascript" src="./js/menu.js"></script>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Make Orders</title>

  <link rel="stylesheet" href="./css/w3.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/menu.css" />
</head>

<body class="w3-khaki">
  <?php include "./navbar.php"; ?>
  <!-- dine in or take away prompt -->
  <div id="dinein-con">
    <div id="dinein" class="dinein w3-round-large w3-card">
      <h1>Do you want to dine in or take away?</h1>
      <div class="dinein-btn">
        <button id="dine_in" class="w3-cyan" onclick="goToBottom(this.id);">
          Dine in
        </button>
        <button id="take_away" class="w3-lime" onclick="goToBottom(this.id);">
          Take away
        </button>
      </div>
    </div>
  </div>
  <div class="menu-wrapper">
    <div id="menu" class="menu w3-card">
      <button id="select-beve" onclick="hideFood()">Select Beverage</button>
      <p class="menu-title"></p>
      <div id="food-menu-con" class="food-menu-con">
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/food-img.png" alt="" srcset="">
            <p class="food-title">Food title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/food-img.png" alt="" srcset="">
            <p class="food-title">Food title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/food-img.png" alt="" srcset="">
            <p class="food-title">Food title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/food-img.png" alt="" srcset="">
            <p class="food-title">Food title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/food-img.png" alt="" srcset="">
            <p class="food-title">Food title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/food-img.png" alt="" srcset="">
            <p class="food-title">Food title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/food-img.png" alt="" srcset="">
            <p class="food-title">Food title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/food-img.png" alt="" srcset="">
            <p class="food-title">Food title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>


      </div>

      <!-- beverage menu below -->


      <div id="beve-menu-con" class="beve-menu-con">
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/beve-img.png" alt="" srcset="">
            <p class="food-title">Beverage Title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/beve-img.png" alt="" srcset="">
            <p class="food-title">Beverage Title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/beve-img.png" alt="" srcset="">
            <p class="food-title">Beverage Title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/beve-img.png" alt="" srcset="">
            <p class="food-title">Beverage Title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/beve-img.png" alt="" srcset="">
            <p class="food-title">Beverage Title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/beve-img.png" alt="" srcset="">
            <p class="food-title">Beverage Title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/beve-img.png" alt="" srcset="">
            <p class="food-title">Beverage Title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>
        <div class="food-con-wrapper">
          <div id="food_0001" class="food-con w3-card">
            <img src="./images/beve-img.png" alt="" srcset="">
            <p class="food-title">Beverage Title</p>
            <p class="food-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button class="btn-addtocart ">Add to cart</button>
          </div>
        </div>


      </div>
    </div>
  </div>

</body>

</html>

<script>
  window.onload = () => {
    document.getElementById("menu-btn").classList.add("active");
  };
</script>

<?php
//$_SESSION["cart"] = array("hi");
unset($_SESSION["cart"]);
if (!empty($_SESSION["cart"])) {
  echo '<script type="text/javascript">',
  'goToBottom("test");',
  '</script>';
} else {
  echo '<script type="text/javascript">',
  'start();',
  '</script>';
}
?>