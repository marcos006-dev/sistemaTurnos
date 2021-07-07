// Validaciones para el Formulario de Alta de Personas con Usuario Incluido

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
btnGuardarUsuario.addEventListener("click", (e) => {
  if (validarNombrePersona(nombrePersona.value) == false) {
    e.preventDefault();
  } else if (validarApellidoPersona(apellidoPersona.value) == false) {
    e.preventDefault();
  } else if (validarDniPersona(dniPersona.value) == false) {
    e.preventDefault();
  } else if (validarTelefonoPersona(telefonoPersona.value) == false) {
    e.preventDefault();
  } else if (validarCorreoPersona(correoPersona.value) == false) {
    e.preventDefault();
  } else if (validarNombreUsuario(nombreUsuario.value) == false) {
    e.preventDefault();
  } else if (validarContrasena(contrasena.value) == false) {
    e.preventDefault();
  } else if (
    validarContrasenaVerificar(contrasenaVerificacion.value) == false
  ) {
    e.preventDefault();
  } else if (validarTipoUsuario(comboTipoUsuario.value) == false) {
    e.preventDefault();
  } else {
    Swal.fire({
      position: "top-end",
      icon: "success",
      title: "El Usuario se ha Registrado con Exito",
      showConfirmButton: false,
      timer: 1500,
    });
    location.reload();
  }
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
    return false;
  } else if (paramNombrePers.length < 3 || paramNombrePers.length == 0) {
    ViualizarMensaje(
      "alertNombre",
      "No se permite los numeros y espacios en blanco",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertNombre", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
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
    return false;
  } else if (paramApellidoPer.length < 3 || paramApellidoPer.length == 0) {
    ViualizarMensaje(
      "alertApellido",
      "No se permite los numeros y espacios en blanco",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertApellido", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
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
    return false;
  } else if (paramDni.length == 0) {
    ViualizarMensaje("alertDni", "Debe rellenar el campo", "text-danger");
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertDni", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
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
    desactivarBtnGuardarUsuario();
    return false;
  } else if (paramTelefono.length == 0) {
    ViualizarMensaje("alertTelefono", "Debe Rellenar el campo", "text-danger");
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertTelefono", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
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
    return false;
  } else if (paramCorreo.length == 0) {
    ViualizarMensaje("alertCorreo", "Debe rellena el campo", "text-danger");
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertCorreo", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
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
    return false;
  } else if (paramNombreUsuario.length < 3 || paramNombreUsuario.length == 0) {
    ViualizarMensaje(
      "alertNombreUsuario",
      "El nombre debe ser mayor a 3 caracteres y menor o igual a 9",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertNombreUsuario", "✔", "alert-success");
    activarBtnGuardarUsuario();
    return true;
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
    return false;
  } else if (patronContrasena.length < 8 || patronContrasena.length == 0) {
    ViualizarMensaje(
      "alertContrasena",
      "La contraseña debe tener minimo 8 caracteres",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertContrasena", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
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
    return false;
  } else if (paramContrasenaVerificar != contrasena.value) {
    ViualizarMensaje(
      "alertContrasenaVerificada",
      "Las Contraseñas no coinciden",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else if (
    paramContrasenaVerificar.length < 8 ||
    paramContrasenaVerificar.length == 0
  ) {
    ViualizarMensaje(
      "alertContrasenaVerificada",
      "La contraseña debe tener minimo 8 caracteres",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertContrasenaVerificada", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};
const validarTipoUsuario = (paramTipoUsuario) => {
  if (paramTipoUsuario == 0) {
    ViualizarMensaje(
      "alertTipoUsuario",
      "Debe seleccionar una opcion",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertTipoUsuario", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};

// Validaciones para el Formulario de Asignar un Usuario a una Persona ya dada de alta

asignarComboDoctor.addEventListener("change", (e) => {
  const doctor = e.target.value;
  validarAsignarDoctor(doctor);
});
asignarNombreUsuario.addEventListener("keyup", (e) => {
  const nomUsuario = e.target.value;

  validarAsignarNombreUsuario(nomUsuario);
});
asignarContrasena.addEventListener("keyup", (e) => {
  const contrasenaUsu = e.target.value;

  validarAsignarContrasena(contrasenaUsu);
});
asignarContrasenaVerificacion.addEventListener("keyup", (e) => {
  const contraVerificar = e.target.value;

  validarAsignarContrasenaVerificar(contraVerificar);
});
asignarComboTipoUsuario.addEventListener("change", (e) => {
  const tipoUsuario = e.target.value;
  validarAsignarTipoUsuario(tipoUsuario);
});

const validarAsignarDoctor = (paramTipoUsuario) => {
  if (paramTipoUsuario == 0) {
    ViualizarMensaje(
      "AsignarAlertTipoUsuario",
      "Debe seleccionar una opcion",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("AsignarAlertTipoUsuario", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};
const validarAsignarNombreUsuario = (paramNombreUsuario) => {
  const patronNombreUsuario = /^[a-z0-9ü][a-z0-9ü_]{3,9}$/;

  if (!paramNombreUsuario.match(patronNombreUsuario)) {
    ViualizarMensaje(
      "AsignarAlertNombreUsuario",
      "No cumple con los requisitos",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else if (paramNombreUsuario.length < 3 || paramNombreUsuario.length == 0) {
    ViualizarMensaje(
      "AsignarAlertNombreUsuario",
      "El nombre debe ser mayor a 3 caracteres y menor o igual a 9",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("AsignarAlertNombreUsuario", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};
const validarAsignarContrasena = (paramContrasena) => {
  const patronContrasena =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

  if (!paramContrasena.match(patronContrasena)) {
    ViualizarMensaje(
      "AsignarAlertContrasena",
      "La contraseña no cumple con los requisitos",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else if (patronContrasena.length < 8 || patronContrasena.length == 0) {
    ViualizarMensaje(
      "AsignarAlertContrasena",
      "La contraseña debe tener minimo 8 caracteres",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("AsignarAlertContrasena", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};
const validarAsignarContrasenaVerificar = (paramContrasenaVerificar) => {
  const patronContrasenaVerificacion =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%*?&#.$($)$-$_]{8,15}$/;

  if (!paramContrasenaVerificar.match(patronContrasenaVerificacion)) {
    ViualizarMensaje(
      "AsignarAlertContrasenaVerificada",
      "La contraseña no cumple con los requisitos",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else if (paramContrasenaVerificar != asignarContrasena.value) {
    ViualizarMensaje(
      "AsignarAlertContrasenaVerificada",
      "Las Contraseñas no coinciden",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else if (
    paramContrasenaVerificar.length < 8 ||
    paramContrasenaVerificar.length == 0
  ) {
    ViualizarMensaje(
      "AsignarAlertContrasenaVerificada",
      "La contraseña debe tener minimo 8 caracteres",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("AsignarAlertContrasenaVerificada", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};
const validarAsignarTipoUsuario = (paramTipoUsuario) => {
  if (paramTipoUsuario == "0") {
    ViualizarMensaje(
      "AsignarAlertDoctor",
      "Debe seleccionar una opcion",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("AsignarAlertDoctor", "✔", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};

asignarBtnGuardarUsuario.addEventListener("click", (e) => {
  if (validarAsignarDoctor(asignarComboDoctor.value) == false) {
    e.preventDefault();
  } else if (validarAsignarNombreUsuario(asignarNombreUsuario.value) == false) {
    e.preventDefault();
  } else if (validarAsignarContrasena(asignarContrasena.value) == false) {
    e.preventDefault();
  } else if (
    validarAsignarContrasenaVerificar(asignarContrasenaVerificacion.value) ==
    false
  ) {
    e.preventDefault();
  } else if (
    validarAsignarTipoUsuario(asignarComboTipoUsuario.value) == false
  ) {
    e.preventDefault();
  } else {
    e.preventDefault();
    const datosForm = new FormData();
    console.log(dataIdPersona);
    let dataIdPersona = document
      .getElementById("idPersona")
      .getAttribute("data-idPersona");

    datosForm.append("asignarNombreUsuario", asignarNombreUsuario.value);
    datosForm.append("asignarContrasena", asignarContrasena.value);
    datosForm.append("asignarComboTipoUsuario", asignarComboTipoUsuario.value);
    datosForm.append("idPersona", dataIdPersona);
    fetch("./guardarPersonaConUsuario.php", {
      method: "POST",
      body: datosForm,
    })
      .then((res) => res.text())
      .then((datos) => {
        console.log(datos);

        if (datos == true) {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "El Usuario se ha Registrado con Exito",
            showConfirmButton: false,
            timer: 1500,
          });
          location.reload();
        } else {
          Swal.fire({
            position: "top-end",
            icon: "error",
            title: "A Ocurrido un error",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
  }
});
