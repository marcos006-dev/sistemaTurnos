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
    e.preventDefault()
     const datosFormu = new FormData();
   
    datosFormu.append("nombrePersona", nombrePersona.value);
    datosFormu.append("apellidoPersona", apellidoPersona.value);
    datosFormu.append("dniPersona", dniPersona.value);
    datosFormu.append("telefonoPersona", telefonoPersona.value);
    datosFormu.append("correoPersona", correoPersona.value);
    datosFormu.append("nombreUsuario", nombreUsuario.value);
    datosFormu.append("contrasena", contrasena.value);
    datosFormu.append("tipoUsuario", comboTipoUsuario.value);
 
    fetch("./guardarPersonaConUsuario.php", {
      method: "POST",
      body: datosFormu,
    })
      .then((res) => res.json())
      .then((datos) => {

        console.log(datos);
          
        if (datos == true) {
          Swal.fire({
            icon: "success",
            timer: 3000,
            text: 'Los Datos se han guardado Correctamente',
          }).then((result) => {
            if (
              result.dismiss === Swal.DismissReason.timer ||
              result.isConfirmed == true
            ) {
              window.location.reload();
            }
          });

        } else {
          e.preventDefault()
           Swal.fire({
            icon: "error",
            timer: 3000,
            text: 'Ha ocurrido un error',
          })
          
          
        }
      });
  }
});

const validarNombrePersona = (paramNombrePers) => {
  const PATRONNOMBRE = /^[a-zA-Z????????????????????????]+$/;

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
    ViualizarMensaje("alertNombre", "???", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};
const validarApellidoPersona = (paramApellidoPer) => {
  const PATRONAPELLIDO = /^[a-zA-Z????????????????????????]+$/;

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
    ViualizarMensaje("alertApellido", "???", "text-success");
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
    ViualizarMensaje("alertDni", "???", "text-success");
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
    ViualizarMensaje("alertTelefono", "???", "text-success");
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
    ViualizarMensaje("alertCorreo", "???", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};
const validarNombreUsuario = (paramNombreUsuario) => {
  const patronNombreUsuario = /^[a-z0-9??][a-z0-9??_]{3,9}$/;

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
    ViualizarMensaje("alertNombreUsuario", "???", "alert-success");
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
      "La contrase??a no cumple con los requisitos",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else if (patronContrasena.length < 8 || patronContrasena.length == 0) {
    ViualizarMensaje(
      "alertContrasena",
      "La contrase??a debe tener minimo 8 caracteres",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertContrasena", "???", "text-success");
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
      "La contrase??a no cumple con los requisitos",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else if (paramContrasenaVerificar != contrasena.value) {
    ViualizarMensaje(
      "alertContrasenaVerificada",
      "Las Contrase??as no coinciden",
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
      "La contrase??a debe tener minimo 8 caracteres",
      "text-danger"
    );
    desactivarBtnGuardarUsuario();
    return false;
  } else {
    ViualizarMensaje("alertContrasenaVerificada", "???", "text-success");
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
    ViualizarMensaje("alertTipoUsuario", "???", "text-success");
    activarBtnGuardarUsuario();
    return true;
  }
};

