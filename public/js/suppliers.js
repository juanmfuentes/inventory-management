$(document).on("click", ".btnEditSupplier", function () {
    var idSupplier = $(this).attr("idSupplier");

    var data = new FormData();
    data.append("idSupplier", idSupplier);

    $.ajax({
        url: "../ajax/suppliers.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            $("#editSupplierId").val(response["id"]);
            $("#editSupplierName").val(response["name"]);
            $("#editSupplierDescription").val(response["description"]);
        }
    });
});

$(document).on("click", ".btnDeleteSupplier", function () {

    var idSupplier = $(this).attr("idSupplier");

    Swal.fire({
        icon: "warning",
        title: "¿Está seguro que desea borrar este proveedor?",
        text: "¡No se puede deshacer esta acción!",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Borrar proveedor",
        confirmButtonColor: "#007bff",
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545"
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?route=suppliers&idSupplier=" + idSupplier;
        }
    });

})