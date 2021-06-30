const peticionNomUsu = (paramNombreUsu) => {
  console.log(paramNombreUsu);

  const nomUsuarioVerificar = new FormData(paramNombreUsu);

  fetch("../../../modAbmlUsuarios/resultFormAgregarUsuario.php", {
    method: "POST",
    body: nomUsuarioVerificar,
  })
    .then((response) => response.json())
    .then((datos) => datos)
    .catch((error) => console.error(error));

  console.log(datos);
};
