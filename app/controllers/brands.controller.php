<?php

class ControllerBrands
{

    static public function ctrNewBrand()
    {
        // Verifica si se ha enviado el formulario de nuevo usuario
        if (isset($_POST["brandName"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["brandName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["brandDescription"])
            ) {

                $table = "brands";

                $data = array(
                    "name" => $_POST["brandName"],
                    "description" => $_POST["brandDescription"]
                );

                $response = BrandsModel::mdlNewBrand($table, $data);

                if ($response == true) {
                    echo '
                        <script>
                            Swal.fire({
                                icon: "success",
                                title: "¡La marca se ha creado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result)=> {
                                if(result.value) {
                                    window.location = "brands"; // Redirige a la página de usuarios
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
                                window.location = "brands"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrShowBrands($item, $value)
    {

        $table = "brands";
        $response = BrandsModel::mdlShowBrands($table, $item, $value);

        return $response;
    }

    static public function ctrEditBrand()
    {   
        // Verifica si se ha enviado el formulario de edición
        if (isset($_POST["editBrandId"])) {

            // Verifica que los nombres y el usuario no contengan caracteres especiales
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editBrandName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["editBrandDescription"])
            ) {

                $table = "brands"; // Define la tabla a actualizar

                // Prepara los datos para la actualización
                $data = array(
                    "id" => $_POST["editBrandId"],
                    "name" => $_POST["editBrandName"],
                    "description" => $_POST["editBrandDescription"],
                );

                // Llama al modelo para actualizar los datos
                $response = BrandsModel::mdlEditBrand($table, $data);

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
                                window.location = "brands"; // Redirige a la página de usuarios
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
                            window.location = "brands"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }

    //Borrar marca
    static public function ctrDeleteBrand()
    {
        if (isset($_GET["idBrand"])) {

            $table = "brands";
            $data = $_GET["idBrand"];

            $response = BrandsModel::mdlDeleteBrand($table, $data);

            if ($response == true) {
                echo '
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "¡La marca se ha eliminado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=> {
                        if(result.value) {
                            window.location = "brands"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }
}
