function openMenu() {
  var x = document.getElementById("menu");
  if (x.style.visibility === "hidden") {
    x.style.visibility = "visible";
  } else {
    x.style.visibility = "hidden";
  }
}

/**
 * Modal
 */
function openModal() {
    document.getElementById("loginModal").style.visibility = "visible";
}
function closeModal() {
    document.getElementById("loginModal").style.visibility = "hidden";
}
