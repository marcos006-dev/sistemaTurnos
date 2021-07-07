nombrePersona.addEventListener("keyup", (e) => {
  const nombrePer = e.target.value;
  validarNombrePersona(nombrePer);
});
apellidoPersona.addEventListener("keyup", (e) => {
  const apellidoPer = e.target.value;
  validarApellidoPersona(apellidoPer);
});
dniPersona.addEventListener("keyup", (e) => {
  const dniPer = e.target.value;

  validarDniPersona(dniPer);
});
telefonoPersona.addEventListener("keyup", (e) => {
  const telefonoPer = e.target.value;
  validarTelefonoPersona(telefonoPer);
});
correoPersona.addEventListener("keyup", (e) => {
  const correoPer = e.target.value;

  validarCorreoPersona(correoPer);
});
nombreUsuario.addEventListener("keyup", (e) => {
  const nomUsuario = e.target.value;

  validarNombreUsuario(nomUsuario);
});
contrasena.addEventListener("keyup", (e) => {
  const contrasenaUsu = e.target.value;

  validarContrasena(contrasenaUsu);
});
contrasenaVerificacion.addEventListener("keyup", (e) => {
  const contraVerificar = e.target.value;

  validarContrasenaVerificar(contraVerificar);
});
comboTipoUsuario.addEventListener("change", (e) => {
  const tipoUsuario = e.target.value;
  validarTipoUsuario(tipoUsuario);
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
  } else if (paramNombrePers.length < 3) {
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
const validarApellidoPersona = (paramApellidoPer) => {
  const PATRONAPELLIDO = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/;

  if (!paramApellidoPer.match(PATRONAPELLIDO)) {
    ViualizarMensaje(
      "alertApellido",
      "No se permite los numeros y espacios en blanco",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else if (paramApellidoPer.length < 3) {
    ViualizarMensaje(
      "alertApellido",
      "No se permite los numeros y espacios en blanco",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertApellido", "✔", "text-success");
    activarBtnGuardarUsuario();
  }
};
const validarDniPersona = (paramDni) => {
  const PATRONDNI = /^\d{8}(?:[-\s]\d{4})?$/;

  if (!paramDni.match(PATRONDNI)) {
    ViualizarMensaje(
      "alertDni",
      "No se permite las letras y espacios en blanco y debe ser igual a 8 numeros",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertDni", "✔", "text-success");
    activarBtnGuardarUsuario();
  }
};
const validarTelefonoPersona = (paramTelefono) => {
  const PATRONTELEFONO = /^\d{10}(?:[-\s]\d{4})?$/;

  if (!paramTelefono.match(PATRONTELEFONO)) {
    ViualizarMensaje(
      "alertTelefono",
      "No se permite las letras y espacios en blanco y debe ser igual a 10 digitos",
      "text-danger"
    );
  } else {
    ViualizarMensaje("alertTelefono", "✔", "text-success");
    desactivarBtnGuardarUsuario();
  }
};
const validarCorreoPersona = (paramCorreo) => {
  const PATRONCORREO = /^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;

  if (!paramCorreo.match(PATRONCORREO)) {
    ViualizarMensaje(
      "alertCorreo",
      "Formato de correo no valido por favor verifique!",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertCorreo", "✔", "text-success");
    activarBtnGuardarUsuario();
  }
};
const validarNombreUsuario = (paramNombreUsuario) => {
  const patronNombreUsuario = /^[a-z0-9ü][a-z0-9ü_]{3,9}$/;

  if (!paramNombreUsuario.match(patronNombreUsuario)) {
    ViualizarMensaje(
      "alertNombreUsuario",
      "No cumple con los requisitos",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else if (paramNombreUsuario.length < 3) {
    ViualizarMensaje(
      "alertNombre",
      "El nombre debe ser mayor a 3 caracteres y menor o igual a 9",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertNombreUsuario", "✔", "alert-success");
    activarBtnGuardarUsuario();
  }
};
const validarContrasena = (paramContrasena) => {
  const patronContrasena =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

  if (!paramContrasena.match(patronContrasena)) {
    ViualizarMensaje(
      "alertContrasena",
      "La contraseña no cumple con los requisitos",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else if (patronContrasena.length < 8) {
    ViualizarMensaje(
      "alertContrasena",
      "La contraseña debe tener minimo 8 caracteres",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertContrasena", "✔", "text-success");
    activarBtnGuardarUsuario();
  }
};
const validarContrasenaVerificar = (paramContrasenaVerificar) => {
  const patronContrasenaVerificacion =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

  if (!paramContrasenaVerificar.match(patronContrasenaVerificacion)) {
    ViualizarMensaje(
      "alertContrasenaVerificada",
      "La contraseña no cumple con los requisitos",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else if (paramContrasenaVerificar != contrasena.value) {
    ViualizarMensaje(
      "alertContrasenaVerificada",
      "Las Contraseñas no coinciden",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertContrasenaVerificada", "✔", "text-success");
    activarBtnGuardarUsuario();
  }
};
const validarTipoUsuario = (paramTipoUsuario) => {
  if (paramTipoUsuario != "1") {
    ViualizarMensaje(
      "alertTipoUsuario",
      "Las Contraseñas no coinciden",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
  } else {
    ViualizarMensaje("alertTipoUsuario", "✔", "text-success");
    activarBtnGuardarUsuario();
  }
};

btnGuardarUsuario.addEventListener("click", (e) => {
  e.preventDefault();
  guardarDatosUsuario();
});
