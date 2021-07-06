nombrePersona.addEventListener("keyup", (e) => {
  const nombrePer = e.target.value;
  validarNombrePersona(nombrePer);
});

const validarNombrePersona = (paramNombrePers) => {
  const PATRONNOMBRE = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/;

  if (!paramNombrePers.match(PATRONNOMBRE)) {
    ViualizarMensaje(
      "alertNombre",
      "No se permite los numeros y espacios en blanco",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertNombre", "✔", "text-success");
    activarBtnGuardarUsuario();
  }

  if (paramNombrePers.length < 3) {
    ViualizarMensaje(
      "alertNombre",
      "No se permite los numeros y espacios en blanco",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertNombre", "✔", "text-success");
    activarBtnGuardarUsuario();
  }
};

apellidoPersona.addEventListener("keyup", (e) => {
  const PATRONAPELLIDO = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/;

  if (!e.currentTarget.value.match(PATRONAPELLIDO)) {
    ViualizarMensaje(
      "alertApellido",
      "No se permite los numeros y espacios en blanco"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }
  if (e.currentTarget.value.length < 3) {
    ViualizarMensaje(
      "alertApellido",
      "El apellido debe ser mayor a 3 caracteres"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }
  ViualizarMensaje("alertApellido", " ");
  activarBtnGuardarUsuario();
  return true;
});

dniPersona.addEventListener("keyup", (e) => {
  const PATRONDNI = /^\d{8}(?:[-\s]\d{4})?$/;

  if (!e.currentTarget.value.match(PATRONDNI)) {
    ViualizarMensaje(
      "alertDni",
      "No se permite las letras y espacios en blanco y debe ser igual a 8 numeros"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }
  ViualizarMensaje("alertDni", " ");
  activarBtnGuardarUsuario();
  return true;
});

telefonoPersona.addEventListener("keyup", (e) => {
  const PATRONTELEFONO = /^\d{10}(?:[-\s]\d{4})?$/;

  if (!e.currentTarget.value.match(PATRONTELEFONO)) {
    ViualizarMensaje(
      "alertTelefono",
      "No se permite las letras y espacios en blanco y debe ser igual a 10 digitos"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }

  ViualizarMensaje("alertTelefono", " ");
  activarBtnGuardarUsuario();
  return true;
});

correoPersona.addEventListener("change", (e) => {
  const PATRONCORREO = /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;

  if (!e.currentTarget.value.match(PATRONCORREO)) {
    ViualizarMensaje(
      "alertCorreo",
      "Formato de correo no valido por favor verifique!"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }
  ViualizarMensaje("alertCorreo", " ");
  activarBtnGuardarUsuario();
  return true;
});

nombreUsuario.addEventListener("keyup", (e) => {
  const patronNombreUsuario = /^[a-z0-9ü][a-z0-9ü_]{3,9}$/;

  if (!e.currentTarget.value.match(patronNombreUsuario)) {
    ViualizarMensaje("alertNombreUsuario", "No cumple con los requisitos");
    desactivarBtnGuardarUsuario();
    return false;
  }
  if (e.currentTarget.value.length < 3) {
    ViualizarMensaje(
      "alertNombre",
      "El nombre debe ser mayor a 3 caracteres y menor o igual a 9"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }
  ViualizarMensaje("alertNombreUsuario", " ");
  activarBtnGuardarUsuario();
  peticionNomUsu(e.currentTarget.value);
  return true;
});

contrasena.addEventListener("keyup", (e) => {
  const patronContrasena =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

  if (!e.currentTarget.value.match(patronContrasena)) {
    ViualizarMensaje(
      "alertNombreContrasena",
      "La contraseña no cumple con los requisitos"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }
  if (e.currentTarget.value.length < 8) {
    ViualizarMensaje(
      "alertContrasena",
      "La contraseña debe tener minimo 8 caracteres"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }
  ViualizarMensaje("alertContrasena", " ");
  activarBtnGuardarUsuario();
  return true, contrasena;
});

contrasenaVerificacion.addEventListener("keyup", (e, contrasena) => {
  const patronContrasenaVerificacion =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

  if (!e.currentTarget.value.match(patronContrasenaVerificacion)) {
    ViualizarMensaje(
      "alertContrasenaVerificada",
      "La contraseña no cumple con los requisitos"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }
  if (e.currentTarget.value != contrasena) {
    ViualizarMensaje(
      "alertContrasenaVerificada",
      "Las Contraseñas no coinciden"
    );
    desactivarBtnGuardarUsuario();
    return false;
  }

  ViualizarMensaje("alertContrasenaVerificada", " ");
  activarBtnGuardarUsuario();
  return true;
});

comboEstadoUsuario.addEventListener("change", (e) => {
  if (e.currentTarget.value != "0") {
    activarBtnGuardarUsuario();
  }
});

comboTipoUsuario.addEventListener("change", (e) => {
  if (e.currentTarget.value != "0") {
    activarBtnGuardarUsuario();
  }
});

btnGuardarUsuario.addEventListener("click", (e) => {
  e.preventDefault();
  guardarDatosUsuario();
});
