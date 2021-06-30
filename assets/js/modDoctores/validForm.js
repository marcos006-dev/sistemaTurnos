nombreDoctor.addEventListener("keyup", (e) => {
  const PATRONNOMBRE = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/;

  if (!e.currentTarget.value.match(PATRONNOMBRE)) {
    mostrarMensaje(
      "alertNombre",
      "No se permite los numeros y espacios en blanco"
    );
    desactBtnGuardarDoctor();
    return false;
  }
  if (e.currentTarget.value.length < 3) {
    mostrarMensaje("alertNombre", "El nombre debe ser mayor a 3 caracteres");
    desactBtnGuardarDoctor();
    return false;
  }
  mostrarMensaje("alertNombre", "");
  actBtnGuardarDoctor();
  return true;
});

apellidoDoctor.addEventListener("keyup", (e) => {
  const PATRONAPELLIDO = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/;

  if (!e.currentTarget.value.match(PATRONAPELLIDO)) {
    mostrarMensaje(
      "alertApellido",
      "No se permite los numeros y espacios en blanco"
    );
    desactBtnGuardarDoctor();
    return false;
  }
  if (e.currentTarget.value.length < 3) {
    mostrarMensaje(
      "alertApellido",
      "El apellido debe ser mayor a 3 caracteres"
    );
    desactBtnGuardarDoctor();
    return false;
  }
  mostrarMensaje("alertApellido", "");
  actBtnGuardarDoctor();
  return true;
});

dniDoctor.addEventListener("change", (e) => {
  const PATRONDNI = /^\d{8}(?:[-\s]\d{4})?$/;

  // VERIFICAR FORMATO DE DNI INGRESADO
  if (!e.currentTarget.value.match(PATRONDNI)) {
    mostrarMensaje(
      "alertDni",
      "No se permite las letras y espacios en blanco y debe ser igual a 8 numeros"
    );
    desactBtnGuardarDoctor();
    return false;
  }

  // VERIFICAR QUE EL DNI INGRESADO NO EXISTA EN LA BD

  verficarDniDoctor(e.currentTarget.value);
});

const verficarDniDoctor = async (paramDniDoctor) => {
  let url = `./ajaxDoctores.php?dniDoctor=${paramDniDoctor}&accion=verificarDni`;
  let result = await getDatosJson(url).then((resultVerif) => resultVerif);
  if (result.mensaje != "") {
    mostrarMensaje("alertDni", result.mensaje);
    desactBtnGuardarDoctor();
    return false;
  }
  mostrarMensaje("alertDni", "");
  actBtnGuardarDoctor();
  return true;
};

telefonoDoctor.addEventListener("change", (e) => {
  const PATRONTELEFONO = /^\d{10}(?:[-\s]\d{4})?$/;

  if (!e.currentTarget.value.match(PATRONTELEFONO)) {
    mostrarMensaje(
      "alertTelefono",
      "No se permite las letras y espacios en blanco y debe ser igual a 10 digitos"
    );
    desactBtnGuardarDoctor();
    return false;
  }
  mostrarMensaje("alertTelefono", "");
  actBtnGuardarDoctor();
  return true;
});

correoDoctor.addEventListener("change", (e) => {
  const PATRONCORREO = /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;

  if (!e.currentTarget.value.match(PATRONCORREO)) {
    mostrarMensaje(
      "alertCorreo",
      "Formato de correo no valido por favor verifique!"
    );
    desactBtnGuardarDoctor();
    return false;
  }
  mostrarMensaje("alertCorreo", "");
  actBtnGuardarDoctor();
  return true;
});

comboEspecialidades.addEventListener("change", (e) => {
  if (e.currentTarget.value != "0") {
    actBtnGuardarDoctor();
  }
});

btnGuardarDoctor.addEventListener("click", (e) => {
  e.preventDefault();
  if (
    nombreDoctor.value.trim() == "" ||
    apellidoDoctor.value.trim() == "" ||
    dniDoctor.value.trim() == "" ||
    telefonoDoctor.value.trim() == "" ||
    correoDoctor.value.trim() == "" ||
    comboEspecialidades.value.trim() == "0" ||
    comboHorariosTrabajos.value.trim() == "0"
  ) {
    mostrarMensaje(
      "alertBtn",
      "Los campos no puede quedar vacios, por favor verifique!"
    );
    desactBtnGuardarDoctor();
    return false;
  }
  mostrarMensaje("alertBtn", "");
  actBtnGuardarDoctor();
  guardarDatosDoctores();
  // console.log("paso");
  return true;
});
