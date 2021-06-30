nombreUsuario.addEventListener("keyup", (e) => {
  const patronNombreUsuario = /^[a-z0-9ü][a-z0-9ü_]{3,9}$/;

  if (!e.currentTarget.value.match(patronNombreUsuario)) {
    mostrarMensaje(
      "alertNombreUsuario",
      "No se permite los espacios en blanco"
    );
    desactBtnGuardarUsuario();
    return false;
  }
  if (e.currentTarget.value.length < 3) {
    mostrarMensaje(
      "alertNombre",
      "El nombre debe ser mayor a 3 caracteres y menor o igual a 9"
    );
    desactBtnGuardarUsuario();
    return false;
  }
  mostrarMensaje("alertNombreUsuario", "");
  actBtnGuardarUsuario();
  return true;
});

contrasena.addEventListener("keyup", (e) => {
  const patronContrasena =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

  if (!e.currentTarget.value.match(patronContrasena)) {
    mostrarMensaje(
      "alertNombreContrasena",
      "La contraseña no cumple con los requisitos"
    );
    desactBtnGuardarUsuario();
    return false;
  }
  if (e.currentTarget.value.length < 8) {
    mostrarMensaje(
      "alertContrasena",
      "La contraseña debe tener minimo 8 caracteres"
    );
    desactBtnGuardarUsuario();
    return false;
  }
  mostrarMensaje("alertContrasena", "");
  actBtnGuardarUsuario();
  return true, contrasena;
});

contrasenaVerificacion.addEventListener("keyup", (e, contrasena) => {
  const patronContrasenaVerificacion =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

  if (!e.currentTarget.value.match(patronContrasenaVerificacion)) {
    mostrarMensaje(
      "alertContrasenaVerificada",
      "La contraseña no cumple con los requisitos"
    );
    desactBtnGuardarUsuario();
    return false;
  }
  if (e.currentTarget.value != contrasena) {
    mostrarMensaje("alertContrasenaVerificada", "Las Contraseñas no coinciden");
    desactBtnGuardarUsuario();
    return false;
  }
  mostrarMensaje("alertContrasenaVerificada", "");
  actBtnGuardarUsuario();
  return true;
});

comboEstadoUsuario.addEventListener("change", (e) => {
  if (e.currentTarget.value != "0") {
    actBtnGuardarUsuario();
  }
});

comboTipoUsuario.addEventListener("change", (e) => {
  if (e.currentTarget.value != "0") {
    actBtnGuardarUsuario();
  }
});

btnGuardarUsuario.addEventListener("click", (e) => {
  e.preventDefault();
  guardarDatosUsuario();
});
