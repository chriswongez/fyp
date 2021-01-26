<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/w3.css" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./css/loginregister.css" />
  <title>Login and Register page</title>
</head>

<body class="w3-khaki">
  <?php include "./navbar.php"; ?>

  <script>
    window.onload = () => {
      document.getElementById("login-btn").classList.add("active");
    };
  </script>


  <button class="adminloginbutton w3-button w3-orange w3-card w3-round w3-hover-sand" type="button">
    Admin Login
  </button>
  <div class="w3-container w3-card w3-round-large w3-sand login">
    <h1 style="padding: 0px 16px; margin-top: 15px; margin-bottom: 0">
      Welcome! Please login or register.
    </h1>
    <div class="loginregister">
      <form action="" class="w3-container" style="margin: 15px 15px; width: 50%">
        <h3>Login</h3>
        <table>
          <tr>
            <td>
              <p>Username:</p>
            </td>
            <td>
              <p><input type="text" /></p>
            </td>
          </tr>
          <tr>
            <td>
              <p>Password:</p>
            </td>
            <td>
              <p><input type="password" name="" id="" /></p>
            </td>
          </tr>
        </table>
        <input type="submit" class="w3-orange w3-text-white w3-round" value="Login" />
      </form>
      <div class="vl"></div>
      <form action="" class="w3-container" style="margin: 15px 15px; width: 50%">
        <h3>Register</h3>
        <table>
          <tr>
            <td>
              <p>Username:</p>
            </td>
            <td>
              <p><input type="text" /></p>
            </td>
          </tr>
          <tr>
            <td>
              <p>Password:</p>
            </td>
            <td>
              <p>
                <input type="password" name="" id="" placeholder="Mininum 8 characters" />
              </p>
            </td>
          </tr>
          <tr>
            <td>
              <p>E-mail:</p>
            </td>
            <td>
              <p>
                <input type="email" name="" id="" placeholder="example@xxx.com" />
              </p>
            </td>
          </tr>
        </table>
        <input type="submit" class="w3-orange w3-round w3-text-white" value="Register" />
      </form>
    </div>
  </div>
</body>

<script>
  window.onload = () => {
    document.getElementById("login-btn").classList.add("active");
  };
</script>

</html>