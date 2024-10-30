<?php

class ControllerLocations
{

    static public function ctrNewLocation()
    {
        // Verifica si se ha enviado el formulario de nuevo usuario
        if (isset($_POST["locationName"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["locationName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["locationDescription"])
            ) {

                $table = "locations";

                $data = array(
                    "name" => $_POST["locationName"],
                    "description" => $_POST["locationDescription"]
                );

                $response = LocationsModel::mdlNewLocation($table, $data);

                if ($response == true) {
                    echo '
                        <script>
                            Swal.fire({
                                icon: "success",
                                title: "¡La ubicación se ha creado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result)=> {
                                if(result.value) {
                                    window.location = "locations"; // Redirige a la página de usuarios
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
                                window.location = "locations"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrShowLocations($item, $value)
    {

        $table = "locations";
        $response = LocationsModel::mdlShowLocations($table, $item, $value);

        return $response;
    }

    static public function ctrEditLocation()
    {   
        // Verifica si se ha enviado el formulario de edición
        if (isset($_POST["editLocationId"])) {

            // Verifica que los nombres y el usuario no contengan caracteres especiales
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editLocationName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["editLocationDescription"])
            ) {

                $table = "locations"; // Define la tabla a actualizar

                // Prepara los datos para la actualización
                $data = array(
                    "id" => $_POST["editLocationId"],
                    "name" => $_POST["editLocationName"],
                    "description" => $_POST["editLocationDescription"],
                );

                // Llama al modelo para actualizar los datos
                $response = LocationsModel::mdlEditLocation($table, $data);

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
                                window.location = "locations"; // Redirige a la página de usuarios
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
                            window.location = "locations"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }

    //Borrar ubicación
    static public function ctrDeleteLocation()
    {
        if (isset($_GET["idLocation"])) {

            $table = "locations";
            $data = $_GET["idLocation"];

            $response = LocationsModel::mdlDeleteLocation($table, $data);

            if ($response == true) {
                echo '
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "¡La ubicación se ha eliminado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=> {
                        if(result.value) {
                            window.location = "locations"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }
}
