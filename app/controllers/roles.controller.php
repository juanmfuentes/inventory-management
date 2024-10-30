<?php

class ControllerRoles
{

    static public function ctrNewRole()
    {
        // Verifica si se ha enviado el formulario de nuevo usuario
        if (isset($_POST["roleName"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["roleName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["roleDescription"])
            ) {

                $table = "roles";

                $data = array(
                    "name" => $_POST["roleName"],
                    "description" => $_POST["roleDescription"]
                );

                $response = RolesModel::mdlNewRole($table, $data);

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
                                    window.location = "roles"; // Redirige a la página de usuarios
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
                                window.location = "roles"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrShowRoles($item, $value)
    {

        $table = "roles";
        $response = RolesModel::mdlShowRoles($table, $item, $value);

        return $response;
    }

    static public function ctrEditRole()
    {   
        // Verifica si se ha enviado el formulario de edición
        if (isset($_POST["editRoleId"])) {

            // Verifica que los nombres y el usuario no contengan caracteres especiales
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editRoleName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["editRoleDescription"])
            ) {

                $table = "roles"; // Define la tabla a actualizar

                // Prepara los datos para la actualización
                $data = array(
                    "id" => $_POST["editRoleId"],
                    "name" => $_POST["editRoleName"],
                    "description" => $_POST["editRoleDescription"],
                );

                // Llama al modelo para actualizar los datos
                $response = RolesModel::mdlEditRole($table, $data);

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
                                window.location = "roles"; // Redirige a la página de usuarios
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
                            window.location = "roles"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }

    //Borrar rol
    static public function ctrDeleteRole()
    {
        if (isset($_GET["idRole"])) {

            $table = "roles";
            $data = $_GET["idRole"];

            $response = RolesModel::mdlDeleteRole($table, $data);

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
                            window.location = "roles"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }
}
