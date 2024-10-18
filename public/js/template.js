$('.tables').DataTable({

    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "No hay información para mostrar",
        "sInfo": "Mostrando registros del _START_ al _END_ de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de 0",
        "sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": "",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior",
        },
        "oAria": {
            "sSortAscending": "Ordenar de forma ascendente",
            "sSortDescending": "Ordenar de fomra descendente",
        },
    },
    "responsive": true
});


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

// Agregar los eventos de clic
document.getElementById('togglePassword1').addEventListener('click', function() {
    togglePassword('inputPassword', 'togglePassword1');
});
document.getElementById('togglePassword2').addEventListener('click', function() {
    togglePassword('inputConfirmPassword', 'togglePassword2');
});
document.getElementById('togglePassword3').addEventListener('click', function() {
    togglePassword('editPassword', 'togglePassword3');
});
document.getElementById('togglePassword4').addEventListener('click', function() {
    togglePassword('editConfirmPassword', 'togglePassword4');
});