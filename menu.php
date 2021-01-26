<script type="text/javascript" src="./js/menu.js"></script>
<script src="./js/jquery-3.5.1.min.js"></script>

<?php
session_start();
require_once('./php/dbconnect.php');
//unset($_SESSION["cart"]);
$status = "";
if (isset($_POST['reset'])) {
  unset($_SESSION["cart"]);
  unset($_SESSION["menustat"]);
}
if (isset($_POST['food']) && $_POST['food'] != "") {
  $foodCode = $_POST['food'];
  $result = mysqli_query($con, "SELECT * FROM product WHERE productCode ='$foodCode'");
  $row = mysqli_fetch_assoc($result);
  $name = $row['productName'];
  $foodCode = $row['productCode'];
  $price = $row['productPrice'];
  $productImg = $row['productImg'];

  $cartArray = array(
    $foodCode => array(
      'name' => $name,
      'productCode' => $foodCode,
      'price' => $price,
      'quantity' => 1,
      'productImg' => $productImg
    )
  );
  // $status = $foodCode;

  if (empty($_SESSION['cart'])) {
    $_SESSION["cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
  } else {
    $array_keys = array_keys($_SESSION["cart"]);

    if (in_array($foodCode, $array_keys)) {
      $status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";
    } else {

      // $_SESSION["cart"] = array_merge($_SESSION["cart"], $cartArray);
      $_SESSION["cart"] = $_SESSION["cart"] + $cartArray;
      "<div class='box'>Product is added to your cart!</div>";
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
            <?php print_r($_SESSION["cart"]); ?>
            <?php print_r($_SESSION["menustat"]); ?>
            <span id="bevebutcount"></span>
            <button id="select-beve" value="beve" onclick="showBeve()">Select Beverage</button>
            <button id="select-food" value="food" onclick="showFood()">Select Food</button>
            <form action="" method="post">
                <input type="hidden" name="reset">
                <input type="submit" value="reset">
            </form>
            <p class="menu-title"></p>
            <span><?php print_r($status) ?></span>

            <div id="food-menu-con" class="food-menu-con">
                <?php
        $result = mysqli_query($con, "SELECT * FROM `product` where productCategory = 'food'");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<form action='' method='post' class='food-con-wrapper'>
                <div  class='food-con w3-card'>
			          <input type='hidden' name='food' value=" . $row['productCode'] . " />
			          <img src='./product/" . $row['productImg'] . "'>
                <p class='food-title'>RM " . $row['productPrice'] . " " . $row['productName'] . "</p>
                <p class='food-desc'>" . $row['productDesc'] . "</p>
                <button type='submit' class='btn-addtocart '>Add to cart</button>
                </div>
        </form>";
        }
        ?>
            </div>
            <!-- beverage menu below -->
            <div id="beve-menu-con" class="beve-menu-con">
                <?php
        $result = mysqli_query($con, "SELECT * FROM `product` where productCategory = 'beve'");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<form action='' method='post' class='food-con-wrapper'>
                <div  class='food-con w3-card'>
			          <input type='hidden' name='food' value=" . $row['productCode'] . " />
			          <img src='./product/" . $row['productImg'] . "'>
                <p class='food-title'>RM " . $row['productPrice'] . " " . $row['productName'] . "</p>
                <p class='food-desc'>" . $row['productDesc'] . "</p>
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
$('#select-beve').on('click', function() {
    var val = $(this).attr("value");
    $.ajax({

        type: 'POST',
        url: './php/buttonstat.php',
        data: {
            clicked: val
        },
        success: (e) => {
            document.getElementById('bevebutcount').innerHTML = e;
        }
    });
});

$('#select-food').on('click', function() {
    var val = $(this).attr("value");
    $.ajax({

        type: 'POST',
        url: './php/buttonstat.php',
        data: {
            clicked: val
        },
        success: (e) => {
            document.getElementById('bevebutcount').innerHTML = e;
        }
    });
});
</script>

<?php
//$_SESSION["cart"] = array("hi");
//unset($_SESSION["cart"]);
if (!empty($_SESSION["cart"])) {
  echo '<script type="text/javascript">',
  'goToBottom("test");',
  '</script>';
  if (isset($_SESSION['menustat']) && $_SESSION['menustat'] == 'beve') {
    echo '<script type="text/javascript">',
    'showBeve("test");',
    '</script>';
  }
} else {
  echo '<script type="text/javascript">',
  'start();',
  '</script>';
}
?>