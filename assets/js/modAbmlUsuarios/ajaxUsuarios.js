const peticionNomUsu = () => {
  const nomUsuarioVerificar = new FormData();

  const opcionesPeticion = {
    method: "POST",
    body: nomUsuarioVerificar,
  };

  fetch(
    "../../../modAbmlUsuarios/resultFormAgregarUsuario.php",
    opcionesPeticion
  )
    .then((response) => response.json())
    .then((datos) => datos)
    .catch((error) => console.error(error));
};
