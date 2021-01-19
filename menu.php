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
    <?php include "./php/navbar.php";?>
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

    <section></section>
  </body>
</html>

<script>
  window.onload = () => {
    document.getElementById("menu-btn").classList.add("active");
  };
</script>
<script type="text/javascript" src="./js/menu.js"></script>
