function formulariosAlta(paramCargar) {
  var i;
  var x = document.getElementsByClassName("formulario");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(paramCargar).style.display = "block";
}
