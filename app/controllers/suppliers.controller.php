<?php

class ControllerSuppliers
{

    static public function ctrNewSupplier()
    {
        // Verifica si se ha enviado el formulario de nuevo usuario
        if (isset($_POST["supplierName"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["supplierName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["supplierDescription"])
            ) {

                $table = "suppliers";

                $data = array(
                    "name" => $_POST["supplierName"],
                    "description" => $_POST["supplierDescription"]
                );

                $response = SuppliersModel::mdlNewSupplier($table, $data);

                if ($response == true) {
                    echo '
                        <script>
                            Swal.fire({
                                icon: "success",
                                title: "¡El rol se ha creado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result)=> {
                                if(result.value) {
                                    window.location = "suppliers"; // Redirige a la página de usuarios
                                }
                            });
                        </script>';
                }
            } else {
                // Si alguno de los campos no es válido, muestra un mensaje de error
                echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "¡No puedes usar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result)=> {
                            if(result.value) {
                                window.location = "suppliers"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrShowSuppliers($item, $value)
    {

        $table = "suppliers";
        $response = SuppliersModel::mdlShowSuppliers($table, $item, $value);

        return $response;
    }

    static public function ctrEditSupplier()
    {   
        // Verifica si se ha enviado el formulario de edición
        if (isset($_POST["editSupplierId"])) {

            // Verifica que los nombres y el usuario no contengan caracteres especiales
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editSupplierName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["editSupplierDescription"])
            ) {

                $table = "suppliers"; // Define la tabla a actualizar

                // Prepara los datos para la actualización
                $data = array(
                    "id" => $_POST["editSupplierId"],
                    "name" => $_POST["editSupplierName"],
                    "description" => $_POST["editSupplierDescription"],
                );

                // Llama al modelo para actualizar los datos
                $response = SuppliersModel::mdlEditSupplier($table, $data);

                // Verifica si la actualización fue exitosa
                if ($response == true) {
                    echo '
                    <script>
                        Swal.fire({
                            icon: "success",
                            title: "¡Los cambios se han guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result)=> {
                            if(result.value) {
                                window.location = "suppliers"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
                }
            } else {
                // Si los nombres o el usuario contienen caracteres especiales
                echo '
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "¡No puedes usar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=> {
                        if(result.value) {
                            window.location = "suppliers"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }

    //Borrar rol
    static public function ctrDeleteSupplier()
    {
        if (isset($_GET["idSupplier"])) {

            $table = "suppliers";
            $data = $_GET["idSupplier"];

            $response = SuppliersModel::mdlDeleteSupplier($table, $data);

            if ($response == true) {
                echo '
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "¡El rol se ha eliminado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=> {
                        if(result.value) {
                            window.location = "suppliers"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }
}
