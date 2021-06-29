const nombreUsuario = document.getElementById("nombreUsuario");
const contrasena = document.getElementById("contrasena").value;
const contrasenaVerificacion = document.getElementById(
  "contrasenaVerificacion"
).value;
const comboEstadoUsuario = document.getElementById("estadoUsuario");
const comboTipoUsuario = document.getElementById("tipoUsuario");
const btnGuardarUsuario = document.getElementById("btnGuardarUsuario");

// const getDatosJson = async (paramUrl) => {
//   return await fetch(paramUrl)
//     .then((response) => response.json())
//     .then((datos) => datos)
//     .catch((error) => console.error(error));
// };

// funciones activar y desactivar btn de submit
const desactBtnGuardarUsuario = () => {
  btnGuardarDoctor.setAttribute("disabled", true);
};

const actBtnGuardarUsuario = () => {
  btnGuardarDoctor.removeAttribute("disabled");
};

// funcion para mostrar mensaje de alerta
const mostrarMensaje = (paramNombreElemento, paramMensaje) => {
  document.getElementById(paramNombreElemento).innerHTML = paramMensaje;
};
