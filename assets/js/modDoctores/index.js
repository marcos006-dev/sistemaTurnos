const nombreDoctor = document.getElementById("nombreDoctor");
const apellidoDoctor = document.getElementById("apellidoDoctor");
const dniDoctor = document.getElementById("dniDoctor");
const telefonoDoctor = document.getElementById("telefonoDoctor");
const correoDoctor = document.getElementById("correoDoctor");
const comboEspecialidades = document.getElementById("comboEspecialidades");
const comboHorariosTrabajos = document.getElementById("comboHorariosTrabajos");
const btnGuardarDoctor = document.getElementById("btnGuardarDoctor");
const divTablaTurnosxDia = document.getElementById("tablaTurnosxDia");

const getDatosJson = async (paramUrl) => {
  return await fetch(paramUrl)
    .then((response) => response.json())
    .then((datos) => datos)
    .catch((error) => console.error(error));
};

const setDatosJson = async (paramUrl, paramData, paramAccion) => {
  console.log(paramData);
  let body = new FormData();
  body.append(paramAccion, JSON.stringify(paramData));

  return await fetch(paramUrl, {
    method: "POST",
    body: body,
  })
    .then((response) => response.json())
    .then((datos) => datos)
    .catch((error) => console.error(error));
};

// funciones activar y desactivar btn de submit
const desactBtnGuardarDoctor = () => {
  btnGuardarDoctor.setAttribute("disabled", true);
};

const actBtnGuardarDoctor = () => {
  btnGuardarDoctor.removeAttribute("disabled");
};

// funcion para mostrar mensaje de alerta
const mostrarMensaje = (paramNombreElemento, paramMensaje) => {
  document.getElementById(paramNombreElemento).innerHTML = paramMensaje;
};
