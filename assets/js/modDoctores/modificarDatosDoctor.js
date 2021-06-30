// Obtener idHorarioTrabajo
const idDoctor = document.getElementById("idDoctor");
// const tablaTurnosxDiaEditar = document.getElementById("tablaTurnosxDiaEditar");

const comboHorariosTrabajosEditar = document.getElementById(
  "comboHorariosTrabajosEditar"
);

comboHorariosTrabajosEditar.addEventListener("change", (e) => {
  verificarTurnosxDia(e.currentTarget.value, idDoctor.value);
});

const verificarTurnosxDia = (paramIdCombo, paramIdDoctor) => {
  //   console.log(paramIdCombo, paramIdDoctor);

  let url = `ajaxDoctores.php?accion=verificarTurnosDoctor&idDoctor=${paramIdDoctor}&idHorarioTrabajo=${paramIdCombo}`;

  getDatosJson(url).then((resVerifDoctor) => {
    console.log(resVerifDoctor);

    if (resVerifDoctor.mensaje) {
      console.log("cargar datos para modificar");
      armarTablaModificarDoctor(resVerifDoctor);
    } else {
      console.log("cargar mostrar formulario");
      armarTablaTurnosxDia(paramIdCombo, "tablaTurnosxDiaEditar");
    }
  });
};

const armarTablaModificarDoctor = async (paramResVerifDoctor) => {
  const { mensaje } = paramResVerifDoctor;

  let urlGetDias = `ajaxDoctores.php?accion=getDias`;
  let resultDatosDias = await getDatosJson(urlGetDias).then(
    (responseDias) => responseDias
  );

  let cantTabla = mensaje[0].idHorarioTrabajo == "AMBOS" ? 2 : 1;
  const titulosTurnosTabla =
    mensaje[0].idHorarioTrabajo == 3 || mensaje[0].idHorarioTrabajo == 1
      ? ["Mañana", "Tarde"]
      : ["Mañana", "Tarde"].reverse();
  for (let i = 0; i < cantTabla; i++) {
    let tablaTurnosxDiaModificarHtml = "";

    tablaTurnosxDiaModificarHtml += `
    <h3 class="text-center">Turnos Correspondientes a la ${titulosTurnosTabla[i]}</h3>
    <table class="table table-striped table-bordered dt-responsive nowrap turnosxDia" style="width:100%">
            <thead>
                  <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Cantidad Turnos</th>
                  </tr>
                </thead>
                <tbody>
        `;
    for (const key in mensaje) {
      let resulDia = resultDatosDias.mensaje.filter(
        (dia) => dia.idDia == mensaje[key].idDia
      );
      //   console.log(resulDia[0].descripcionDia);
      tablaTurnosxDiaModificarHtml += `
                    <tr>
                        <td>${resulDia[0].descripcionDia}</td>
                        <td><input type="number" class="single-input inputCantDiaModificar" name="inputCantDiaModificar" data-idTurnoxDia =${mensaje[key].idTurnosxDia} value="${mensaje[key].cantTurnosDisp}"></td>
                    </tr>
        `;
    }
    tablaTurnosxDiaModificarHtml += `
    </tbody>
    <table>`;
    tablaTurnosxDiaEditar.innerHTML = tablaTurnosxDiaModificarHtml;
  }
};

document.addEventListener("DOMContentLoaded", function (e) {
  verificarTurnosxDia(comboHorariosTrabajosEditar.value, idDoctor.value);
});
