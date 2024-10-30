$(document).on("click", ".btnEditBrand", function () {
    var idBrand = $(this).attr("idBrand");

    var data = new FormData();
    data.append("idBrand", idBrand);

    $.ajax({
        url: "../ajax/brands.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            $("#editBrandId").val(response["id"]);
            $("#editBrandName").val(response["name"]);
            $("#editBrandDescription").val(response["description"]);
        }
    });
});

$(document).on("click", ".btnDeleteBrand", function () {

    var idBrand = $(this).attr("idBrand");

    Swal.fire({
        icon: "warning",
        title: "¿Está seguro que desea borrar la marca?",
        text: "¡No se puede deshacer esta acción!",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Borrar marca",
        confirmButtonColor: "#007bff",
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545"
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?route=brands&idBrand=" + idBrand;
        }
    });

})