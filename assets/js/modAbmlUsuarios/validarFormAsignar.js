
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
    const idPersona =
      asignarComboDoctor.options[asignarComboDoctor.selectedIndex].getAttribute(
        "data-idPersona"
      );
   
    datosForm.append("asignarNombreUsuario", asignarNombreUsuario.value);
    datosForm.append("asignarContrasena", asignarContrasena.value);
    datosForm.append("asignarComboTipoUsuario", asignarComboTipoUsuario.value);
    datosForm.append("idPersona", idPersona);
    fetch("./guardarAsignarUsuario.php", {
      method: "POST",
      body: datosForm,
    })
      .then((res) => res.json())
      .then((datos) => {
       

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


