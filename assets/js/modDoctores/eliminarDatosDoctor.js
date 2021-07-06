function eliminarDatos(e) {
  e.preventDefault();
  Swal.fire({
    title: "¿Desea eliminar este doctor?",
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
      let idDoctor = e.target.href.split("=")[1];
      let urlBorrarDoctor = `ajaxDoctores.php?idDoctor=${idDoctor}&accion=borrarDoctor`;
      //   console.log();
      getDatosJson(urlBorrarDoctor).then(({ estado, mensaje }) => {
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
