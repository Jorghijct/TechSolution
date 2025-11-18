// validaciones.js - Desarrollado por Jorghi Cote

$(document).ready(function () {
  // Función para validar si un campo está vacío o solo tiene espacios
  function validarCampoVacio(valor) {
    return valor.trim() === "";
  }

  // Función para mostrar errores en los campos
  function mostrarError(campoId, mensaje) {
    $("#error-" + campoId)
      .text(mensaje)
      .show();
    $("#" + campoId).css("border-color", "#d32f2f");
  }

  // Función para limpiar errores
  function limpiarErrores() {
    $(".error-message").hide();
    $("input, textarea, select").css("border-color", "#ddd");
  }

  // Validación del formulario de categorías
  $("#formCategorias").on("submit", function (e) {
    e.preventDefault();
    limpiarErrores();

    let camposInvalidos = [];
    let formularioValido = true;

    // Validar ID
    const id = $("#id").val();
    if (validarCampoVacio(id)) {
      mostrarError("id", "El ID es obligatorio");
      camposInvalidos.push("ID");
      formularioValido = false;
    }

    // Validar nombre
    const nombre = $("#nombre").val();
    if (validarCampoVacio(nombre)) {
      mostrarError("nombre", "El nombre de la categoría es obligatorio");
      camposInvalidos.push("Nombre");
      formularioValido = false;
    }

    // Validar descripción
    const descripcion = $("#descripcion").val();
    if (validarCampoVacio(descripcion)) {
      mostrarError("descripcion", "La descripción es obligatoria");
      camposInvalidos.push("Descripción");
      formularioValido = false;
    }

    if (!formularioValido) {
      let mensajeAlerta =
        "Los siguientes campos están vacíos o contienen solo espacios en blanco:\n\n";
      mensajeAlerta += camposInvalidos.join("\n");
      mensajeAlerta += "\n\nDesarrollado por: Jorghi Cote";

      alert(mensajeAlerta);
    } else {
      // Si todo está válido, enviar el formulario
      this.submit();
    }
  });

  // Validación del formulario de productos
  $("#formProductos").on("submit", function (e) {
    e.preventDefault();
    limpiarErrores();

    let camposInvalidos = [];
    let formularioValido = true;

    // Validar ID
    const id = $("#id").val();
    if (validarCampoVacio(id)) {
      mostrarError("id", "El ID del producto es obligatorio");
      camposInvalidos.push("ID del Producto");
      formularioValido = false;
    }

    // Validar nombre
    const nombre = $("#nombre").val();
    if (validarCampoVacio(nombre)) {
      mostrarError("nombre", "El nombre del producto es obligatorio");
      camposInvalidos.push("Nombre del Producto");
      formularioValido = false;
    }

    const imagen = $("#imagen").val();
    if (validarCampoVacio(imagen)) {
      mostrarError("imagen", "La URL de la imagen es obligatoria");
      camposInvalidos.push("URL de la Imagen");
      formularioValido = false;
    }

    // Validar descripción
    const descripcion = $("#descripcion").val();
    if (validarCampoVacio(descripcion)) {
      mostrarError("descripcion", "La descripción del producto es obligatoria");
      camposInvalidos.push("Descripción del Producto");
      formularioValido = false;
    }

    // Validar precio
    const precio = $("#precio").val();
    if (validarCampoVacio(precio)) {
      mostrarError("precio", "El precio es obligatorio");
      camposInvalidos.push("Precio");
      formularioValido = false;
    }

    // Validar categoría
    const categoria_id = $("#categoria_id").val();
    if (validarCampoVacio(categoria_id)) {
      mostrarError("categoria_id", "La categoría es obligatoria");
      camposInvalidos.push("Categoría");
      formularioValido = false;
    }

    if (!formularioValido) {
      let mensajeAlerta =
        "Los siguientes campos están vacíos o contienen solo espacios en blanco:\n\n";
      mensajeAlerta += camposInvalidos.join("\n");
      mensajeAlerta += "\n\nDesarrollado por: Jorghi Cote";

      alert(mensajeAlerta);
    } else {
      // Si todo está válido, enviar el formulario
      this.submit();
    }
  });

  // Limpiar errores cuando el usuario empiece a escribir
  $("input, textarea, select").on("input change", function () {
    const campoId = $(this).attr("id");
    $("#error-" + campoId).hide();
    $(this).css("border-color", "#ddd");
  });
});
