setTimeout(() => {
  document.getElementById("dinein").className += " opacityto1";
}, 500);

function goToBottom() {
  document.getElementById("dinein").style.top = "-100%";
  setTimeout(() => {
    document.getElementById("dinein-con").style.opacity = "0";
    setTimeout(() => {
      document.getElementById("dinein-con").style.display = "none";
    }, 10);
  }, 200);
}
