const guardarDatosDoctores = async () => {
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
  //   console.log(datosCantxDia);
  const objDatosTurnosxDia = {
    nombreDoctor: nombreDoctor.value,
    apellidoDoctor: apellidoDoctor.value,
    dniDoctor: dniDoctor.value,
    telefonoDoctor: telefonoDoctor.value,
    correoDoctor: correoDoctor.value,
    idEspecialidadDoctor: comboEspecialidades.value,
    idHorarioTrabajoDoctor: comboHorariosTrabajos.value,
    cantTurnosxDiaDoctor: datosCantxDia,
  };

  let resultInsertDoctor = await setDatosJson(
    "./ajaxDoctores.php",
    objDatosTurnosxDia,
    "datosArrayxDia"
  );

  Swal.fire({
    icon: resultInsertDoctor.estado == 200 ? "success" : "error",
    timer: 3000,
    text: resultInsertDoctor.mensaje,
  }).then((result) => {
    if (result.dismiss === Swal.DismissReason.timer) {
      window.location.reload();
    }
  });
};
