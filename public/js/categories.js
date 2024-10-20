$(document).on("click", ".btnEditCategory", function () {
    var idCategory = $(this).attr("idCategory");

    var data = new FormData();
    data.append("idCategory", idCategory);

    $.ajax({
        url: "../ajax/categories.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            console.log(response); // Añadir esto para verificar la respuesta
            $("#editCategoryId").val(response["id"]);
            $("#editCategoryName").val(response["name"]);
            $("#editCategoryDescription").val(response["description"]);
        }
    });
});

$(document).on("click", ".btnDeleteCategory", function () {

    var idCategory = $(this).attr("idCategory");

    Swal.fire({
        icon: "warning",
        title: "¿Está seguro de desea borrar la categoría?",
        text: "¡No se puede deshacer esta acción!",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Borrar usuario",
        confirmButtonColor: "#007bff",
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545"
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?route=categories&idCategory=" + idCategory;
        }
    });

})