<script type="text/javascript" src="./js/menu.js"></script>

<?php
session_start();
require_once('./php/dbconnect.php');
if (isset($_POST['code']) && $_POST['code'] != "") {
  $code = $_POST['code'];
  $result = mysqli_query($con, "SELECT * FROM `products` WHERE `code`='$code'");
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
  $code = $row['code'];
  $price = $row['price'];
  $image = $row['image'];

  $cartArray = array(
    $code => array(
      'name' => $name,
      'code' => $code,
      'price' => $price,
      'quantity' => 1,
      'image' => $image
    )
  );

  if (empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
  } else {
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if (in_array($code, $array_keys)) {
      $status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
    } else {
      $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
      $status = "<div class='box'>Product is added to your cart!</div>";
    }
  }
}
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
        <?php
        $result = mysqli_query($con, "SELECT * FROM `food`");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<form action='' method='post' class='food-con-wrapper'>
                <div  class='food-con w3-card'>
			          <input type='hidden' name=" . $row['foodCode'] . " value=" . $row['foodID'] . " />
			          <img src='./images/food-img.png'>
                <p class='food-title'>$" . $row['foodPrice'] . " " . $row['foodName'] . "</p>
                <p class='food-desc'>" . $row['foodDescription'] . "</p>
                <button type='submit' class='btn-addtocart '>Add to cart</button>
                </div>
        </form>";
        }
        ?>
      </div>
      <!-- beverage menu below -->
      <div id="beve-menu-con" class="beve-menu-con">
        <?php
        $result = mysqli_query($con, "SELECT * FROM `beverage`");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<form action='' method='post' class='food-con-wrapper'>
                <div  class='food-con w3-card'>
			          <input type='hidden' name=" . $row['beverageCode'] . " value=" . $row['beverageID'] . " />
			          <img src='./images/beve-img.png'>
                <p class='food-title'>$" . $row['beveragePrice'] . " " . $row['beverageName'] . "</p>
                <p class='food-desc'>" . $row['beverageDescription'] . "</p>
                <button type='submit' class='btn-addtocart '>Add to cart</button>
                </div>
                </form>";
        }
        ?>
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