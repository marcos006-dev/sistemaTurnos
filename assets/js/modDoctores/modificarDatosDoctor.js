// Obtener idHorarioTrabajo
const idDoctor = document.getElementById("idDoctor");
const btnModificarDoctor = document.getElementById("btnModificarDoctor");
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
    // console.log(resVerifDoctor);

    if (resVerifDoctor.mensaje) {
      // console.log("cargar datos para modificar");
      armarTablaModificarDoctor(resVerifDoctor);
    } else {
      // console.log("cargar mostrar formulario");
      armarTablaTurnosxDia(paramIdCombo, "tablaTurnosxDiaEditar");
    }
  });
};

const armarTablaModificarDoctor = async (paramResVerifDoctor) => {
  const { mensaje } = paramResVerifDoctor;

  let urlGetDias = `ajaxDoctores.php?accion=getDias`;
  let resultDatosDias = await getDatosJson(urlGetDias);

  let cantTabla = mensaje[0].idHorarioTrabajo == "3" ? 2 : 1;
  // console.log(mensaje[0]);
  // console.log(mensaje);

  const titulosTurnosTabla =
    mensaje[0].idHorarioTrabajo == 3 || mensaje[0].idHorarioTrabajo == 1
      ? ["Mañana", "Tarde"]
      : ["Mañana", "Tarde"].reverse();

  let contadorDias = 0;
  let estado = mensaje[0].estadoHorario;
  tablaTurnosxDiaEditar.innerHTML = "";
  for (let i = 0; i < cantTabla; i++) {
    let tablaTurnosxDiaModificarHtml = "";
    contadorDias = 0;
    tablaTurnosxDiaModificarHtml += `
    <h3 class="text-center">Turnos Correspondientes a la ${
      titulosTurnosTabla[i]
    }</h3>
    <small>${estado == "1" ? "(Estado Activo)" : "(Estado Inactivo)"}</small>
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
      if (contadorDias < 6) {
        let resultDia = resultDatosDias.mensaje.filter(
          (dia) => dia.idDia == mensaje[key].idDia
        );
        tablaTurnosxDiaModificarHtml += `
                      <tr>
                          <td>${resultDia[0].descripcionDia}</td>
                          <td><input type="number" class="single-input inputCantDiaModificar" name="inputCantDiaModificar" data-idTurnoxDia =${mensaje[key].idTurnosxDia} value="${mensaje[key].cantTurnosDisp}"></td>
                      </tr>
          `;
        delete mensaje[key];
      }
      // mensaje;
      contadorDias++;
    }
    tablaTurnosxDiaModificarHtml += `
    </tbody>
    <table>`;
    tablaTurnosxDiaEditar.innerHTML += tablaTurnosxDiaModificarHtml;
  }
};

btnModificarDoctor.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    comboHorariosTrabajosEditar.value ===
      localStorage.getItem("idHorarioTurnosOriginal") ||
    document.querySelectorAll(".inputCantDiaModificar").length > 0
  ) {
    console.log("Modificar");
    modificarDatosDoctor();
  } else {
    console.log("Insertar");
    insertarDatosDoctores();
  }
});
// FUNCION PARA MODIFICAR LOS DATOS DEL DOCTOR
const modificarDatosDoctor = async () => {
  let resultDatosModificar = obtenerDatosDoctorModificar();

  const objDatosTurnosxDiaModificar = {
    idDoctor: idDoctor.value,
    nombreDoctor: nombreDoctor.value,
    apellidoDoctor: apellidoDoctor.value,
    dniDoctor: dniDoctor.value,
    telefonoDoctor: telefonoDoctor.value,
    correoDoctor: correoDoctor.value,
    idEspecialidadDoctor: comboEspecialidades.value,
    idHorarioTrabajoDoctor: comboHorariosTrabajosEditar.value,
    cantTurnosxDiaDoctorModificar: resultDatosModificar,
  };
  console.log(objDatosTurnosxDiaModificar);
  let resultModifDoctor = await setDatosJson(
    "./ajaxDoctores.php",
    objDatosTurnosxDiaModificar,
    "datosArrayxDiaModificar"
  );
  // console.log(resultModifDoctor);
  Swal.fire({
    icon: resultModifDoctor.estado == 200 ? "success" : "error",
    timer: 3000,
    text: resultModifDoctor.mensaje,
  }).then((result) => {
    if (
      result.dismiss === Swal.DismissReason.timer ||
      result.isConfirmed == true
    ) {
      // window.location.reload();
      location.reload();
    }
  });
  // PONER ALERTA DESPUES
};
// FUNCION PARA INSERTAR LOS DATOS DEL DOCTOR EN EL FORMULARIO DE MODIFICACION
const insertarDatosDoctores = async () => {
  let resultDatosInsertar = obtenerDatosDoctorInsertar();
  const objDatosTurnosxDiaInsertar = {
    idDoctor: idDoctor.value,
    nombreDoctor: nombreDoctor.value,
    apellidoDoctor: apellidoDoctor.value,
    dniDoctor: dniDoctor.value,
    telefonoDoctor: telefonoDoctor.value,
    correoDoctor: correoDoctor.value,
    idEspecialidadDoctor: comboEspecialidades.value,
    idHorarioTrabajoDoctor: comboHorariosTrabajosEditar.value,
    cantTurnosxDiaDoctor: resultDatosInsertar,
  };

  // console.log(objDatosTurnosxDiaInsertar);

  let resultInsertDoctor = await setDatosJson(
    "./ajaxDoctores.php",
    objDatosTurnosxDiaInsertar,
    "datosArrayxDiaInsertar"
  );

  console.log(resultInsertDoctor);
  Swal.fire({
    icon: resultInsertDoctor.estado == 200 ? "success" : "error",
    timer: 3000,
    text: resultInsertDoctor.mensaje,
  }).then((result) => {
    if (
      result.dismiss === Swal.DismissReason.timer ||
      result.isConfirmed == true
    ) {
      // window.location.reload();
      location.reload();
    }
  });
};
// ----------------------------------------------------------------
const obtenerDatosDoctorInsertar = () => {
  const inputDias = document.querySelectorAll(".inputCantDia");
  let datosCantxDia = [];
  for (let inputDia in inputDias) {
    if (typeof inputDias[inputDia] == "object") {
      const datosInsertar = [
        inputDias[inputDia].getAttribute("data-idDia"),
        inputDias[inputDia].getAttribute("data-idHorarTrab"),
        inputDias[inputDia].value,
      ];
      datosCantxDia.push(datosInsertar);
    }
  }
  return datosCantxDia;
};

const obtenerDatosDoctorModificar = () => {
  const inputDias = document.querySelectorAll(".inputCantDiaModificar");
  let datosCantxDiaModificar = [];
  for (let inputDia in inputDias) {
    if (typeof inputDias[inputDia] == "object") {
      const datosModificar = [
        inputDias[inputDia].getAttribute("data-idTurnoxDia"),
        inputDias[inputDia].value,
      ];
      datosCantxDiaModificar.push(datosModificar);
    }
  }
  return datosCantxDiaModificar;
};

document.addEventListener("DOMContentLoaded", function (e) {
  verificarTurnosxDia(comboHorariosTrabajosEditar.value, idDoctor.value);
  localStorage.setItem(
    "idHorarioTurnosOriginal",
    comboHorariosTrabajosEditar.value
  );
});
