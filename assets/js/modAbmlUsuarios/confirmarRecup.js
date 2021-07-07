function recuperarUsuario(e) {
  e.preventDefault();
  Swal.fire({
    title:
      "¿Desea enviar el correo de recuperacion de contraseña a este doctor?",
    // text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Continuar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = e.target.href;
    }
  });
}
