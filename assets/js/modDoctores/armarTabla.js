comboHorariosTrabajos.addEventListener("change", (e) => {
  const idHorarioTrabajo = e.currentTarget.value;
  //   if (e.currentTarget.value != "0") {
  //     actBtnGuardarDoctor();
  //   }
  armarTablaTurnosxDia(idHorarioTrabajo, "tablaTurnosxDia");
});

async function armarTablaTurnosxDia(
  paramIdHorarioTrabajo,
  paramDivMostrarTabla
) {
  //   Obtencion de los datos provenientes del php
  let urlGetDias = `ajaxDoctores.php?accion=getDias`;
  let resultDatosDias = await getDatosJson(urlGetDias).then(
    (responseDias) => responseDias
  );
  let urlHorarTrab = `ajaxDoctores.php?accion=getHorarTrab&id=${paramIdHorarioTrabajo}`;
  let resultHorarTrab = await getDatosJson(urlHorarTrab).then(
    (responseHorarTrab) => responseHorarTrab
  );

  // condicion en caso de que
  if (resultDatosDias.estado != 200 || resultHorarTrab.estado != 200) {
    divTablaTurnosxDia.innerHTML = `<div class="alert alert-danger" role="alert">
    Error al cargar la tabla de los turnos por dia, por favor contactese con el administrador del sistema!
    </div>`;
    desactBtnGuardarDoctor();
    return;
  }

  let cantTabla = resultHorarTrab.mensaje.descripcionHorario == "AMBOS" ? 2 : 1;
  const titulosTurnosTabla =
    paramIdHorarioTrabajo == 3 || paramIdHorarioTrabajo == 1
      ? ["Mañana", "Tarde"]
      : ["Mañana", "Tarde"].reverse();

  let tablaTurnosxDia = "";

  for (let i = 0; i < cantTabla; i++) {
    tablaTurnosxDia += `
    <h3 class="text-center">Turnos Correspondientes a la ${titulosTurnosTabla[i]}</h3>
    <table class="table table-striped table-bordered dt-responsive nowrap turnosxDia"data-idHorTrab="${paramIdHorarioTrabajo}" style="width:100%">
            <thead>
                  <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Cantidad Turnos</th>
                  </tr>
                </thead>
                <tbody>
        `;
    resultDatosDias.mensaje.forEach((dia) => {
      tablaTurnosxDia += `
                    <tr>
                        <td>${dia.descripcionDia}</td>
                        <td><input type="number" class="single-input inputCantDia" name="inputCantDia" data-idDia=${dia.idDia} data-idHorarTrab =${paramIdHorarioTrabajo} value="0"></td>
                    </tr>
        `;
    });
    tablaTurnosxDia += `
    </tbody>
    <table>`;
    // console.log(tablaTurnosxDia);
  }
  // console.log(paramDivMostrarTabla);
  document.getElementById(paramDivMostrarTabla).innerHTML = tablaTurnosxDia;
}
