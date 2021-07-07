// Accediendo a los elementos del formulario de alta de personas con Usuarios incluidos

const nombrePersona = document.getElementById("nombrePersona");
const apellidoPersona = document.getElementById("apellidoPersona");
const dniPersona = document.getElementById("dniPersona");
const telefonoPersona = document.getElementById("telefonoPersona");
const correoPersona = document.getElementById("correoPersona");

const nombreUsuario = document.getElementById("nombreUsuario");
const contrasena = document.getElementById("contrasena");
const contrasenaVerificacion = document.getElementById(
  "contrasenaVerificacion"
);
const comboTipoUsuario = document.getElementById("comboTipoUsuario");
const btnGuardarUsuario = document.getElementById("btnGuardarUsuario");

// Accediendo a los elementos del Formulario de Asignar un Usuario a una Persona ya dada de alta

const asignarComboDoctor = document.getElementById("asignarDoctor");
const asignarNombreUsuario = document.getElementById("asignarNombreUsuario");
const asignarContrasena = document.getElementById("asignarContrasena");
const asignarContrasenaVerificacion = document.getElementById(
  "asignarContrasenaVerificacion"
);
const asignarComboTipoUsuario = document.getElementById(
  "asignarComboTipoUsuario"
);
const asignarBtnGuardarUsuario = document.getElementById(
  "asignarBtnGuardarUsuario"
);
const formAsignarUsuario = document.getElementById("asignarFormAgregDoctor");

// Funciones Generales

const desactivarBtnGuardarUsuario = () => {
  btnGuardarUsuario.setAttribute("disabled", true);
};
const activarBtnGuardarUsuario = () => {
  btnGuardarUsuario.removeAttribute("disabled");
};
// funcion para mostrar mensaje de alerta
const ViualizarMensaje = (paramNombreElemento, paramMensaje, paramClasss) => {
  document.getElementById(paramNombreElemento).innerHTML = paramMensaje;
  document.getElementById(paramNombreElemento).className = paramClasss;
};
