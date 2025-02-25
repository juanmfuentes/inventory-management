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
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;


    