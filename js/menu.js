setTimeout(() => {
  document.getElementById("dinein").className += " opacityto1";
}, 500);

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
  }, 200);
}
