$(document).on("click", ".btnEliminarUsuario", function () {
  let id_usuario = $(this).attr("id_usuario");

  Swal.fire({
    title: "Está seguro de eliminar el usuario?",
    text: "Sino lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar usuario",
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location = "index.php?pagina=usuarios&id_usuario=" + id_usuario;
    }
  });
});

$(document).on("click", ".btnEliminarPlan", function () {
  let id_plan = $(this).attr("id_plan");

  Swal.fire({
    title: "Está seguro de eliminar el plan?",
    text: "Sino lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar plan",
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location = "index.php?pagina=planes&id_plan=" + id_plan;
    }
  });
});

$(document).on("click", ".btnEliminarEntrenador", function () {
  let id_entrenador = $(this).attr("id_entrenador");

  Swal.fire({
    title: "Está seguro de eliminar el entrenador?",
    text: "Sino lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar entrenador",
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location =
        "index.php?pagina=entrenadores&id_entrenador=" + id_entrenador;
    }
  });
});

$(document).on("click", ".btnEliminarCliente", function () {
  let id_cliente = $(this).attr("id_cliente");

  Swal.fire({
    title: "Está seguro de eliminar el cliente?",
    text: "Sino lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar cliente",
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location = "index.php?pagina=clientes&id_cliente=" + id_cliente;
    }
  });
});

$(document).on("click", ".btnEliminarEspecialidad", function () {
  let id_especialidad = $(this).attr("id_especialidad");

  Swal.fire({
    title: "Está seguro de eliminar el especialidad?",
    text: "Sino lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar especialidad",
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location =
        "index.php?pagina=especialidades&id_especialidad=" + id_especialidad;
    }
  });
});

$(document).on("click", ".btnEliminarPago", function () {
  let id_pago = $(this).attr("id_pago");

  Swal.fire({
    title: "Está seguro de eliminar el pago?",
    text: "Sino lo está puede cancelar la acción",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar pago",
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location = "index.php?pagina=pagos&id_pago=" + id_pago;
    }
  });
});
