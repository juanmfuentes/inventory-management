$(document).on("click", ".btnEditUser", function () {

    var idUser = $(this).attr("idUser");

    var data = new FormData();
    data.append("idUser", idUser);

    $.ajax({
        url: "../ajax/users.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            $("#editUserId").val(response["id"]);
            $("#editFirstName").val(response["first_name"]);
            $("#editLastName").val(response["last_name"]);
            $("#editUser").val(response["user"]);
            $("#editRol").html(response["rol"]);
            $("#editRol").val(response["rol"]);
            $("#currentPassword").val(response["password"]);
        }
    });
})


$(document).on("click", ".btnActivate", function () {
    var idUser = $(this).attr("idUser");
    var statusUser = $(this).attr("statusUser");

    var data = new FormData();
    data.append("activateId", idUser);
    data.append("activateUser", statusUser);

    $.ajax({
        url: "../ajax/users.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (window.matchMedia("(max-width:767px)").matches) {
                Swal.fire({
                    icon: "success",
                    title: "¡El usuario ha sido actualizado!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then((result) => {
                    if (result.value) {
                        window.location = "users";
                    }
                });

            }
        }
    });

    if (statusUser == 0) {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).html('Desactivado');
        $(this).attr('statusUser', 1);
        return;
    }

    if (statusUser == 1) {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).html('Activado');
        $(this).attr('statusUser', 0);
        return;
    }

})

// Función que envía mensaje diciendo que el usuario ya existe
$("#inputUser").change(function () {

    setTimeout(function () {
        $(".text-muted").fadeOut(300, function () {
            $(this).remove();
        });
    }, 3000);

    var user = $(this).val();

    var data = new FormData();
    data.append("validateUser", user);

    $.ajax({
        url: "../ajax/users.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response) {
                $("#inputUser").after('<small class="form-text text-muted">¡Este usuario ya existe!</small>');
                $("#inputUser").val("");
            }
        }

    });

})

// Delete user

$(document).on("click", ".btnDeleteUser", function () {

    var idUser = $(this).attr("idUser");

    Swal.fire({
        icon: "warning",
        title: "¿Está seguro de borrar el usuario?",
        text: "¡Si no lo está puede cancelar la acción!",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Borrar usuario",
        confirmButtonColor: "#007bff",
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545"
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?route=users&idUser=" + idUser;
        }
    });

})

// Función para alternar la visibilidad de la contraseña
function togglePassword(inputId, toggleId) {
    const passwordInput = document.getElementById(inputId);
    const passwordIcon = document.getElementById(toggleId).querySelector('i');

    // Alternar tipo de input
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'; // Mostrar la contraseña
        passwordIcon.classList.remove('fa-eye');
        passwordIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password'; // Ocultar la contraseña
        passwordIcon.classList.remove('fa-eye-slash');
        passwordIcon.classList.add('fa-eye');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const togglePassword1 = document.getElementById('togglePassword1');
    const togglePassword2 = document.getElementById('togglePassword2');
    const togglePassword3 = document.getElementById('togglePassword3');
    const togglePassword4 = document.getElementById('togglePassword4');

    // Verificar si el elemento existe antes de añadir el evento
    if (togglePassword1) {
        togglePassword1.addEventListener('click', function() {
            togglePassword('inputPassword', 'togglePassword1');
        });
    }

    if (togglePassword2) {
        togglePassword2.addEventListener('click', function() {
            togglePassword('inputConfirmPassword', 'togglePassword2');
        });
    }

    if (togglePassword3) {
        togglePassword3.addEventListener('click', function() {
            togglePassword('editPassword', 'togglePassword3');
        });
    }

    if (togglePassword4) {
        togglePassword4.addEventListener('click', function() {
            togglePassword('editConfirmPassword', 'togglePassword4');
        });
    }
});