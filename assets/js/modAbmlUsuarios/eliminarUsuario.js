function eliminarUsuario(e) {
  e.preventDefault();
  Swal.fire({
    title: "¿Desea eliminar este usuario?",
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
      let urlBorrarUsuario = `eliminarUsuario.php?idUsuario=${idUsuario}`;
      //   console.log(urlBorrarUsuario);
      getDatosJson(urlBorrarUsuario).then(({ estado, mensaje }) => {
        if (mensaje) {
          Swal.fire("Borrado Completo", mensaje, "success");
          window.location.reload();
        } else {
          Swal.fire("Error al borrar", mensaje, "error");
        }
      });
    }
  });
}
