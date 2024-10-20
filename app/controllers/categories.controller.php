<?php

class ControllerCategories
{

    static public function ctrNewCategory()
    {
        // Verifica si se ha enviado el formulario de nuevo usuario
        if (isset($_POST["categoryName"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["categoryName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["categoryDescription"])
            ) {

                $table = "categories";

                $data = array(
                    "name" => $_POST["categoryName"],
                    "description" => $_POST["categoryDescription"]
                );

                $response = CategoriesModel::mdlNewCategory($table, $data);

                if ($response == true) {
                    echo '
                        <script>
                            Swal.fire({
                                icon: "success",
                                title: "¡La categoría se ha creado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result)=> {
                                if(result.value) {
                                    window.location = "categories"; // Redirige a la página de usuarios
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
                                window.location = "categories"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrShowCategories($item, $value)
    {

        $table = "categories";
        $response = CategoriesModel::mdlShowCategories($table, $item, $value);

        return $response;
    }

    static public function ctrEditCategory()
    {   
        // Verifica si se ha enviado el formulario de edición
        if (isset($_POST["editCategoryId"])) {

            // Verifica que los nombres y el usuario no contengan caracteres especiales
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCategoryName"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["editCategoryDescription"])
            ) {

                $table = "categories"; // Define la tabla a actualizar

                // Prepara los datos para la actualización
                $data = array(
                    "id" => $_POST["editCategoryId"],
                    "name" => $_POST["editCategoryName"],
                    "description" => $_POST["editCategoryDescription"],
                );

                // Llama al modelo para actualizar los datos
                $response = CategoriesModel::mdlEditCategory($table, $data);

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
                                window.location = "categories"; // Redirige a la página de usuarios
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
                            window.location = "categories"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }

    //Borrar categoría
    static public function ctrDeleteCategory()
    {
        if (isset($_GET["idCategory"])) {

            $table = "categories";
            $data = $_GET["idCategory"];

            $response = CategoriesModel::mdlDeleteCategory($table, $data);

            if ($response == true) {
                echo '
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "¡La categoría se ha eliminado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=> {
                        if(result.value) {
                            window.location = "categories"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }
}
