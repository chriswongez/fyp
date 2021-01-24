function start() {
  setTimeout(() => {
    document.getElementById("dinein").className += " opacityto1";
  }, 500);
}

function goToBottom(id) {
  document.getElementById("dinein").style.top = "-100%";
  setTimeout(() => {
    document.getElementById("dinein-con").style.opacity = "0";
  }, 200);
  setTimeout(() => {
    document.getElementById("dinein-con").style.display = "none";
  }, 300);
  getSelection(id);
  showMenu();
}

function getSelection(id) {
  localStorage.setItem("selection", JSON.stringify(id));
}

function showMenu() {
  document.getElementById("menu").style.display = "block";
  setTimeout(() => {
    document.getElementById("menu").style.opacity = "1";
    document.getElementById("menu").style.visibility = "visible";
    document.getElementById("menu").style.marginTop = "80px";
    document.getElementsByClassName("menu-title")[0].innerHTML =
      "Please choose your food.";
  }, 200);
}

function hideFood() {
  document.getElementsByClassName("food-menu-con")[0].style.opacity = "0";
  document.getElementsByClassName("food-menu-con")[0].style.visibility =
    "hidden";
  document.getElementsByClassName("beve-menu-con")[0].style.display = "flex";
  document.getElementById("select-beve").style.opacity = "0";

  setTimeout(() => {
    document.getElementsByClassName("menu-title")[0].innerHTML =
      "Please choose your beverage.";
    document.getElementById("select-beve").style.display = "none";
    document.getElementsByClassName("beve-menu-con")[0].style.opacity = "1";
    document.getElementsByClassName("beve-menu-con")[0].style.visibility =
      "visible";
  }, 200);

  setTimeout(() => {
    document.getElementsByClassName("food-menu-con")[0].style.display = "none";
  }, 205);
}
