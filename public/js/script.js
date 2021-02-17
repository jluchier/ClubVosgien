function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") === -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

function toogleMenu()
{
  var x = document.getElementById("menuColumnMobile");
  if (x.className.indexOf("cv-show-menuMobile") === -1) {
      x.className += " cv-show-menuMobile";
  } else {
      x.className = x.className.replace(" cv-show-menuMobile", "");
  }

  return false;
}
