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

// const getDatosJson = async (paramUrl) => {
//   return await fetch(paramUrl)
//     .then((response) => response.json())
//     .then((datos) => datos)
//     .catch((error) => console.error(error));
// };

// funciones activar y desactivar btn de submit
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
