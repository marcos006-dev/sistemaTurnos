const guardarDatosDoctores = () => {
  //   const tablasTurnosxDia = document.getElementsByClassName("turnosxDia");

  //   console.log(tablasTurnosxDia);
  var valores = "";

  $(".turnosxDia")
    .parent("tr")
    .find("td")
    .each(function () {
      if ($(this).html() != "coger valores de la fila") {
        valores += $(this).html() + " ";
      }
    });

  valores = valores + "\n";
  alert(valores);
};
