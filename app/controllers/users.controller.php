<?php

class ControllerUsers
{

    public function ctrAuthUser()
    {

        if (isset($_POST["postUser"])) {

            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["postUser"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["postPassword"])
            ) {

                $table = "users";

                $item = "user";
                $value = $_POST["postUser"];

                $response = UsersModel::mdlShowUsers($table, $item, $value);

                if (is_array($response)) {
                    if ($response["user"] == $_POST["postUser"] && $response["password"] == $_POST["postPassword"]) {

                        $_SESSION["auth_user"] = true;
                        echo '<script>
                        window.location = "home";
                        </script>';
                    } else {
                        echo '<br><div class="alert alert-danger">La contraseña es incorrecta.</div>';
                    }
                } else {
                    echo '<br><div class="alert alert-danger">El usuario no existe.</div>';
                }
            }
        }
    }
}
