const nombreUsuario = document.getElementById("nombreUsuario");
const contrasena = document.getElementById("contrasena");
const contrasenaVerificacion = document.getElementById(
  "contrasenaVerificacion"
);
const comboEstadoUsuario = document.getElementById("comboEstadoUsuario");
const comboTipoUsuario = document.getElementById("comboTipoUsuario");
const btnGuardarUsuario = document.getElementById("btnGuardarUsuario");

// const getDatosJson = async (paramUrl) => {
//   return await fetch(paramUrl)
//     .then((response) => response.json())
//     .then((datos) => datos)
//     .catch((error) => console.error(error));
// };

// funciones activar y desactivar btn de submit
const desactBtnGuardarUsuario = () => {
  btnGuardarUsuario.setAttribute("disabled", true);
};

const actBtnGuardarUsuario = () => {
  btnGuardarUsuario.removeAttribute("disabled");
};

// funcion para mostrar mensaje de alerta
const mostrarMensaje = (paramNombreElemento, paramMensaje) => {
  document.getElementById(paramNombreElemento).innerHTML = paramMensaje;
};
