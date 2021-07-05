function reactivarDoctor(e) {
  e.preventDefault();
  Swal.fire({
    title: "¿Desea reactivar a este doctor?",
    // text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Reactivar!",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      //   $(this).submit();
      //   console.log();
      let idDoctor = e.target.href.split("=")[1];
      let urlReactivarDoctor = `ajaxDoctores.php?idDoctor=${idDoctor}&accion=reactivarDoctor`;
      // console.log(idDoctor);
      getDatosJson(urlReactivarDoctor).then(({ estado, mensaje }) => {
        console.log(mensaje);
        if (mensaje) {
          Swal.fire("Reactivacion Completa", mensaje, "success");
          window.location.reload();
        } else {
          Swal.fire("Error al reactivar", mensaje, "error");
        }
      });
    }
  });
}
