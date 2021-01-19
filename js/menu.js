setTimeout(() => {
  document.getElementById("dinein").className += " opacityto1";
}, 500);

function getSelection(id) {
  localStorage.setItem("selection", JSON.stringify(id));
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
}
