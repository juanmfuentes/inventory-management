$(document).on("click", ".btnEditLocation", function () {
    var idLocation = $(this).attr("idLocation");

    var data = new FormData();
    data.append("idLocation", idLocation);

    $.ajax({
        url: "../ajax/locations.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            $("#editLocationId").val(response["id"]);
            $("#editLocationName").val(response["name"]);
            $("#editLocationDescription").val(response["description"]);
        }
    });
});

$(document).on("click", ".btnDeleteLocation", function () {

    var idLocation = $(this).attr("idLocation");

    Swal.fire({
        icon: "warning",
        title: "¿Está seguro que desea borrar la ubicación?",
        text: "¡No se puede deshacer esta acción!",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Borrar ubicación",
        confirmButtonColor: "#007bff",
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545"
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?route=locations&idLocation=" + idLocation;
        }
    });

})