function reactivarUsuario(e) {
  e.preventDefault();
  Swal.fire({
    title: "¿Desea reactivar a este usuario?",
    // text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Continuar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      //   $(this).submit();
      //   console.log();
      let idUsuario = e.target.href.split("=")[1];
      //   console.log(idUsuario);
      //   return;
      let urlReactivarUsuario = `reactivarUsuario.php?idUsuario=${idUsuario}`;
      //   console.log(urlReactivarUsuario);
      getDatosJson(urlReactivarUsuario).then(({ estado, mensaje }) => {
        if (mensaje) {
          Swal.fire("Reactivación Completa", mensaje, "success");
          window.location.reload();
        } else {
          Swal.fire("Error al reactivar", mensaje, "error");
        }
      });
    }
  });
}
