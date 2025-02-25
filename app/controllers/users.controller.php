<?php

class ControllerUsers
{

    static public function ctrAuthUser()
    {

        if (isset($_POST["postUser"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["postUser"]) &&
                preg_match('/^[a-zA-Z0-9.]+$/', $_POST["postPassword"])
            ) {

                $hashing = crypt($_POST["postPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $table = "users";

                $item = "user";
                $value = $_POST["postUser"];

                $response = UsersModel::mdlShowUsers($table, $item, $value);

                if (is_array($response)) {
                    if ($response["user"] == $_POST["postUser"] && $response["password"] == $hashing) {

                        if ($response["status"] == 1) {

                            $_SESSION["auth_user"] = true;
                            $_SESSION["id"] = $response["id"];
                            $_SESSION["user"] = $response["user"];
                            $_SESSION["first_name"] = $response["first_name"];
                            $_SESSION["last_name"] = $response["last_name"];
                            $_SESSION["rol"] = $response["rol"];

                            // Registro de último login
                            date_default_timezone_set('America/Mexico_City');

                            $date = date('Y-m-d');
                            $time = date('H:i:s');

                            $currentDate = $date . '       ' . $time;

                            $item1 = "last_login";
                            $value1 = $currentDate;

                            $item2 = "id";
                            $value2 = $response["id"];

                            $lastLogin = UsersModel::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

                            if ($lastLogin == true) {

                                if ($_SESSION["rol"] == 1) {
                                    echo '
                                    <script>
                                        window.location = "home/home";
                                    </script>';
                                } else if ($_SESSION["rol"] == 3){
                                    echo '
                                    <script>
                                        window.location = "search";
                                    </script>';
                                }
                            }
                        } else {

                            echo '<br><div class="alert alert-danger">El usuario no está activado</div>';
                        }
                    } else {
                        echo '<br><div class="alert alert-danger">El usuario o la contraseña son incorrectos.</div>';
                    }
                } else {
                    echo '<br><div class="alert alert-danger">El usuario no existe.</div>';
                }
            }
        }
    }

    static public function ctrNewUser()
    {
        // Verifica si se ha enviado el formulario de nuevo usuario
        if (isset($_POST["inputFirstName"])) {

            // Verifica que todos los campos cumplan con las reglas de validación
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["inputFirstName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["inputLastName"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["inputUser"]) &&
                preg_match('/^[a-zA-Z0-9.]+$/', $_POST["inputPassword"]) &&
                preg_match('/^[a-zA-Z0-9.]+$/', $_POST["inputConfirmPassword"])
            ) {

                // Verifica que la contraseña y su confirmación coincidan
                if ($_POST["inputPassword"] !== $_POST["inputConfirmPassword"]) {
                    echo '
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "¡Las contraseñas no coinciden!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result) => {
                        if(result.value) {
                            window.location = "users"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
                    return; // Detiene la ejecución si las contraseñas no coinciden
                }

                $table = "users"; // Define la tabla para almacenar el nuevo usuario

                // Cifra la contraseña
                $hashing = crypt($_POST["inputPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                // Prepara los datos para la inserción
                $data = array(
                    "first_name" => $_POST["inputFirstName"],
                    "last_name" => $_POST["inputLastName"],
                    "user" => $_POST["inputUser"],
                    "password" => $hashing,
                    "rol" => $_POST["selectRol"],
                    "status" => 1
                );

                // Llama al modelo para insertar el nuevo usuario
                $response = UsersModel::mdlNewUser($table, $data);

                // Verifica si la inserción fue exitosa
                if ($response == true) {
                    echo '
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "¡El usuario se ha guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=> {
                        if(result.value) {
                            window.location = "users"; // Redirige a la página de usuarios
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
                    title: "¡No puedes dejar campos vacíos o usar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then((result)=> {
                    if(result.value) {
                        window.location = "users"; // Redirige a la página de usuarios
                    }
                });
            </script>';
            }
        }
    }


    static public function ctrShowUsers($item, $value)
    {

        $table = "users";
        $response = UsersModel::mdlShowUsers($table, $item, $value);

        return $response;
    }


    static public function ctrEditUser()
    {
        // Verifica si se ha enviado el formulario de edición
        if (isset($_POST["editUser"])) {

            // Verifica que los nombres y el usuario no contengan caracteres especiales
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editFirstName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editLastName"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editUser"])
            ) {

                $table = "users"; // Define la tabla a actualizar

                // Verifica si se ha ingresado una nueva contraseña
                if ($_POST["editPassword"] != "") {

                    // Verifica que la contraseña y su confirmación coincidan
                    if ($_POST["editPassword"] !== $_POST["editConfirmPassword"]) {
                        echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "¡Las contraseñas no coinciden!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result) => {
                            if(result.value) {
                                window.location = "users"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
                        return; // Detiene la ejecución si las contraseñas no coinciden
                    }

                    // Verifica que la nueva contraseña no tenga caracteres especiales
                    if (preg_match('/^[a-zA-Z0-9.]+$/', $_POST["editPassword"])) {
                        // Cifra la nueva contraseña
                        $hashing = crypt($_POST["editPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {
                        echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "¡La contraseña no puede llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((result)=> {
                            if(result.value) {
                                window.location = "users";
                            }
                        });
                    </script>';
                        return; // Detiene la ejecución si la contraseña no es válida
                    }
                } else {
                    // Si no se ingresa una nueva contraseña, usa la contraseña actual
                    $hashing = $_POST["currentPassword"];
                }

                // Prepara los datos para la actualización
                $data = array(
                    "id" => $_POST["editUserId"],
                    "first_name" => $_POST["editFirstName"],
                    "last_name" => $_POST["editLastName"],
                    "user" => $_POST["editUser"],
                    "password" => $hashing,
                    "rol" => $_POST["editRol"]
                );

                // Llama al modelo para actualizar los datos
                $response = UsersModel::mdlEditUser($table, $data);

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
                            window.location = "users"; // Redirige a la página de usuarios
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
                    title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then((result)=> {
                    if(result.value) {
                        window.location = "users"; // Redirige a la página de usuarios
                    }
                });
            </script>';
            }
        }
    }

    //Borrar usuario
    static public function ctrDeleteUser()
    {
        if (isset($_GET["idUser"])) {

            $table = "users";
            $data = $_GET["idUser"];

            $response = UsersModel::mdlDeleteUser($table, $data);

            if ($response == true) {
                echo '
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "¡El usuario se ha eliminado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=> {
                        if(result.value) {
                            window.location = "users"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }
}
