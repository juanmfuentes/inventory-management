<?php

class ControllerProducts
{

    static public function ctrNewProduct()
    {
        // Verifica si se ha enviado el formulario de nuevo usuario
        if (isset($_POST["productDescription"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["productDescription"]) &&
                preg_match('/^[0-9]*$/', $_POST["productStock"]) &&
                preg_match('/^[0-9.]*$/', $_POST["productSellingPrice"]) &&
                preg_match('/^[0-9.]*$/', $_POST["productPurchasePrice"]) &&
                preg_match('/^[0-9.]*$/', $_POST["productWholesalePrice"])
            ) {

                $route = "../public/img/default-product.jpg";

                if (isset($_FILES["newImage"]["tmp_name"]) && $_FILES["newImage"]["tmp_name"] != "") {

                    list($width, $height) = getimagesize($_FILES["newImage"]["tmp_name"]);

                    $newWidth = 500;
                    $newHeight = 500;

                    $directory = "../public/img/products/" . $_POST["productDescription"];

                    mkdir($directory, 0755);


                    if ($_FILES["newImage"]["type"] == "image/jpeg") {

                        $random = mt_rand(100, 999);

                        $route = "../public/img/products/" . $_POST["productDescription"] . "/" . $random . ".jpg";

                        $source = imagecreatefromjpeg($_FILES["newImage"]["tmp_name"]);

                        $destination = imagecreatetruecolor($newWidth, $newHeight);

                        imagecopyresized($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        imagejpeg($destination, $route);
                    }

                    if ($_FILES["newImage"]["type"] == "image/png") {

                        $random = mt_rand(100, 999);

                        $route = "../public/img/products/" . $_POST["productDescription"] . "/" . $random . ".png";

                        $source = imagecreatefrompng($_FILES["newImage"]["tmp_name"]);

                        $destination = imagecreatetruecolor($newWidth, $newHeight);

                        imagecopyresized($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        imagepng($destination, $route);
                    }
                }

                $table = "products";

                $data = array(
                    "description" => $_POST["productDescription"],
                    "internal_code" => $_POST["productInternalCode"],
                    "barcode" => $_POST["productBarcode"],
                    "brand" => $_POST["productBrand"],
                    "category" => $_POST["productCategory"],
                    "location" => $_POST["productLocation"],
                    "supplier" => $_POST["productSupplier"],
                    "selling_price" => $_POST["productSellingPrice"],
                    "stock" => $_POST["productStock"],
                    "purchase_price" => $_POST["productPurchasePrice"],
                    "purchase_with_vat" => $_POST["productWholesalePrice"],
                    "extra_1" => $_POST["productExtra1"],
                    "extra_2" => $_POST["productExtra2"],
                    "extra_3" => $_POST["productExtra3"],
                    "extra_4" => $_POST["productExtra4"],
                    "image" => $route
                );

                $response = ProductsModel::mdlNewProduct($table, $data);
                if ($response == true) {
                    echo '
                        <script>
                            Swal.fire({
                                icon: "success",
                                title: "¡El producto se ha creado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then((result)=> {
                                if(result.value) {
                                    window.location = "products"; // Redirige a la página de usuarios
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
                                window.location = "products"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrShowProducts($item, $value)
    {

        $table = "products";
        $response = ProductsModel::mdlShowProducts($table, $item, $value);

        return $response;
    }



    //Editar producto
    static public function ctrEditProduct()
    {
        // Verifica si se ha enviado el formulario de nuevo usuario
        if (isset($_POST["editIdProduct"])) {
            var_dump($_POST);

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ,. ]*$/', $_POST["editProductDescription"]) &&
                preg_match('/^[0-9]*$/', $_POST["editProductStock"]) &&
                preg_match('/^[0-9.]*$/', $_POST["editProductSellingPrice"]) &&
                preg_match('/^[0-9.]*$/', $_POST["editProductPurchasePrice"]) &&
                preg_match('/^[0-9.]*$/', $_POST["editProductWholesalePrice"])
            ) {

                $route = $_POST["currentImage"];

                if (isset($_FILES["editImage"]["tmp_name"]) && $_FILES["editImage"]["tmp_name"] != "") {

                    list($width, $height) = getimagesize($_FILES["editImage"]["tmp_name"]);

                    $newWidth = 500;
                    $newHeight = 500;

                    $directory = "../public/img/products/" . $_POST["editProductDescription"];

                    if (!empty($_POST["currentImage"]) && $_POST["currentImage"] != "../public/img/default-product.jpg") {

                        unlink($_POST["currentImage"]);
                    } else {

                        mkdir($directory, 0755);
                    }

                    if ($_FILES["editImage"]["type"] == "image/jpeg") {

                        $random = mt_rand(100, 999);

                        $route = "../public/img/products/" . $_POST["editProductDescription"] . "/" . $random . ".jpg";

                        $source = imagecreatefromjpeg($_FILES["editImage"]["tmp_name"]);

                        $destination = imagecreatetruecolor($newWidth, $newHeight);

                        imagecopyresized($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        imagejpeg($destination, $route);
                    }

                    if ($_FILES["editImage"]["type"] == "image/png") {

                        $random = mt_rand(100, 999);

                        $route = "../public/img/products/" . $_POST["editProductDescription"] . "/" . $random . ".png";

                        $source = imagecreatefrompng($_FILES["editImage"]["tmp_name"]);

                        $destination = imagecreatetruecolor($newWidth, $newHeight);

                        imagecopyresized($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        imagepng($destination, $route);
                    }
                }

                $table = "products";

                $data = array(
                    "id" => $_POST["editIdProduct"],
                    "description" => $_POST["editProductDescription"],
                    "internal_code" => $_POST["editProductInternalCode"],
                    "barcode" => $_POST["editProductBarcode"],
                    "brand" => $_POST["editProductBrand"],
                    "category" => $_POST["editProductCategory"],
                    "location" => $_POST["editProductLocation"],
                    "supplier" => $_POST["editProductSupplier"],
                    "selling_price" => $_POST["editProductSellingPrice"],
                    "stock" => $_POST["editProductStock"],
                    "purchase_price" => $_POST["editProductPurchasePrice"],
                    "purchase_with_vat" => $_POST["editProductWholesalePrice"],
                    "extra_1" => $_POST["editProductExtra1"],
                    "extra_2" => $_POST["editProductExtra2"],
                    "extra_3" => $_POST["editProductExtra3"],
                    "extra_4" => $_POST["editProductExtra4"],
                    "image" => $route
                );

                $response = ProductsModel::mdlEditProduct($table, $data);
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
                                    window.location = "products"; // Redirige a la página de usuarios
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
                                window.location = "products"; // Redirige a la página de usuarios
                            }
                        });
                    </script>';
            }
        }
    }





    //Borrar producto
    static public function ctrDeleteProduct()
    {
        if (isset($_GET["idProduct"])) {

            $table = "products";
            $data = $_GET["idProduct"];

            if ($_GET["image"] != "" && $_GET["image"] != "../public/img/default-product.jpg") {
                unlink($_GET["image"]);
                rmdir('../public/img/products/'.$_GET["description"]);
            }

            $response = ProductsModel::mdlDeleteProduct($table, $data);

            if ($response == true) {
                echo '
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "¡El producto se ha eliminado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then((result)=> {
                        if(result.value) {
                            window.location = "products"; // Redirige a la página de usuarios
                        }
                    });
                </script>';
            }
        }
    }
}
