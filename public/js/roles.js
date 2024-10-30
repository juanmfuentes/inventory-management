$(document).on("click", ".btnEditRole", function () {
    var idRole = $(this).attr("idRole");

    var data = new FormData();
    data.append("idRole", idRole);

    $.ajax({
        url: "../ajax/roles.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            $("#editRoleId").val(response["id"]);
            $("#editRoleName").val(response["name"]);
            $("#editRoleDescription").val(response["description"]);
        }
    });
});

$(document).on("click", ".btnDeleteRole", function () {

    var idRole = $(this).attr("idRole");

    Swal.fire({
        icon: "warning",
        title: "¿Está seguro que desea borrar el rol?",
        text: "¡No se puede deshacer esta acción!",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Borrar rol",
        confirmButtonColor: "#007bff",
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545"
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?route=roles&idRole=" + idRole;
        }
    });

})