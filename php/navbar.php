<style>
    /* navbar */
.nav-con {
  width: 98%;
  position: fixed;

  left: 50%;
  top: 10px;
  transform: translateX(-50%);
  margin: 0 auto;
  z-index: 3;
  box-sizing: unset;
}

nav {
  background-color: white;
  overflow: hidden;
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
  border-radius: 5px;
}
nav ul {
  padding: 0;
  margin: 0 0 0 150px;
  list-style: none;
}
nav li {
  float: right;
}

.logo {
  position: absolute;
  display: inline-block;
  top: 50%;
  transform: translateY(-50%);
  height: 100%;
  border-radius: 5px;
}

.logo:hover {
  background-color: gray;
  border-radius: 5px;
  transition: 0.5s;
}

nav a {
  width: 115px;
  display: block;
  padding: 15px 10px;
  font-size: 14pt;
  text-decoration: none;
  font-family: Arial;
  color: black;

  text-align: center;
  border-radius: 5px;
}
.active {
  text-decoration: underline;
}
nav a:hover {
  background-color: grey;
  color: white;
  transition: 0.5s;
  border-radius: 5px;
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
}
/* navbar */
</style>

<header>
      <div class="nav-con">
        <a href="#"><img src="images/logo.png" class="logo" /></a>
        <nav>
          <ul>
            <li><a id="track-btn" href="#Track order">Track Order</a></li>
            <li><a id="login-btn" href="#Login">Login</a></li>
            <li><a id="menu-btn" href="#Menu">Menu</a></li>
            <li><a id="home-btn" href="#home">Home</a></li>
          </ul>
        </nav>
      </div>
    </header>
