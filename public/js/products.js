

function initFileInput(inputId) {
    const fileInput = document.getElementById(inputId);
    if (fileInput) {
        fileInput.addEventListener("change", function () {
            const fileName = this.files[0] ? this.files[0].name : "Selecciona un archivo";
            const label = document.querySelector(`label[for='${inputId}']`);
            label.textContent = fileName;
        });
    }
}

// Espera a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function () {
    initFileInput("inputGroupFile01"); // Llama a la función con el ID del input
    initFileInput("inputGroupFile02"); // Llama a la función con el ID del input
});



$('.tableProducts').DataTable({
    "ajax": "../ajax/datatable-products.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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




$(".tableProducts tbody").on("click", ".btnEditProduct", function () {
    var idProduct = $(this).attr("idProduct");

    var data = new FormData();
    data.append("idProduct", idProduct);

    $.ajax({
        url: "../ajax/products.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {



            var dataSupplier = new FormData();
            dataSupplier.append("idSupplier", response["supplier"])

            $.ajax({
                url: "../ajax/suppliers.ajax.php",
                method: "POST",
                data: dataSupplier,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    $("#editProductSupplier").val(response["id"]);
                    $("#editProductSupplier").html(response["name"]);


                }
            })




            var dataCategory = new FormData();
            dataCategory.append("idCategory", response["category"])

            $.ajax({
                url: "../ajax/categories.ajax.php",
                method: "POST",
                data: dataCategory,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    $("#editProductCategory").val(response["id"]);
                    $("#editProductCategory").html(response["name"]);


                }
            })



            var dataLocation = new FormData();
            dataLocation.append("idLocation", response["location"])

            $.ajax({
                url: "../ajax/locations.ajax.php",
                method: "POST",
                data: dataLocation,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    $("#editProductLocation").val(response["id"]);
                    $("#editProductLocation").html(response["name"]);


                }
            })



            var dataBrand = new FormData();
            dataBrand.append("idBrand", response["brand"])

            $.ajax({
                url: "../ajax/brands.ajax.php",
                method: "POST",
                data: dataBrand,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    $("#editProductBrand").val(response["id"]);
                    $("#editProductBrand").html(response["name"]);


                }
            })

            $("#editIdProduct").val(response["id"]);
            $("#editProductPurchasePrice").val(response["purchase_price"]);
            $("#editProductSellingPrice").val(response["selling_price"]);
            $("#editProductWholesalePrice").val(response["purchase_with_vat"]);
            $("#editProductDescription").val(response["description"]);
            $("#editProductStock").val(response["stock"]);
            $("#editProductInternalCode").val(response["internal_code"]);
            $("#editProductBarcode").val(response["barcode"]);
            $("#editProductExtra1").val(response["extra_1"]);
            $("#editProductExtra2").val(response["extra_2"]);
            $("#editProductExtra3").val(response["extra_3"]);
            $("#editProductExtra4").val(response["extra_4"]);

            if(response["image"] != "") {
                $("#currentImage").val(response["image"]);

                $(".preview").attr("src", response["image"])
            }

        }
    });
});



$(document).on("click", ".btnDeleteProduct", function () {

    var idProduct = $(this).attr("idProduct");
    var description = $(this).attr("description");
    var image = $(this).attr("image");
    

    Swal.fire({
        icon: "warning",
        title: "¿Está seguro que desea borrar el producto?",
        text: "¡No se puede deshacer esta acción!",
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonText: "Borrar producto",
        confirmButtonColor: "#007bff",
        cancelButtonText: "Cancelar",
        cancelButtonColor: "#dc3545"
    }).then((result) => {
        if (result.value) {
            window.location = "index.php?route=products&idProduct=" + idProduct + "&image=" + image + "&description=" + description;
        }
    });

})

$(".newImage").change(function () {

    var image = this.files[0];

    if (image["type"] != "image/jpeg" && image["type"] != "image/png") {

        $(".newImage").val("");

        Swal.fire({
            icon: "error",
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        });
    } else if (image["size"] > 2000000) {

        $(".newImage").val("");

        Swal.fire({
            icon: "error",
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        });
    } else {
        var dataImage = new FileReader;
        dataImage.readAsDataURL(image);

        $(dataImage).on("load", function (event) {

            var routeImage = event.target.result;

            $(".preview").attr("src", routeImage);
        })
    }
})