<?php

require_once "../app/controllers/products.controller.php";
require_once "../app/models/products.model.php";

require_once "../app/controllers/categories.controller.php";
require_once "../app/models/categories.model.php";

require_once "../app/controllers/locations.controller.php";
require_once "../app/models/locations.model.php";

class TableProducts
{
    //Mostrar tabla de productos
    public function showTableProducts()
    {
        $item = null;
        $value = null;

        $products = ControllerProducts::ctrShowProducts($item, $value);

        $dataJson = '{
            "data": [';

        for ($i = 0; $i < count($products); $i++) {

            $image = "<div class='text-center'><img src='" . $products[$i]["image"] . "' class='img-thumbnail' alt='default product' width='40px'></div>";

            $itemCategory = "id";
            $valueCategory = $products[$i]["category"];

            $categories = ControllerCategories::ctrShowCategories($itemCategory, $valueCategory);

            $itemLocation = "id";
            $valueLocation = $products[$i]["location"];

            $locations = ControllerLocations::ctrShowLocations($itemLocation, $valueLocation);

            //Si el stock del producto es menor a 10, el botón de stock se pondra de color rojo, en caso contrario, será verde
            if ($products[$i]["stock"] <= 10) {
                $stock = "<span class='btn btn-sm btn-danger btn-block'>" . $products[$i]["stock"] . "</button>";
            } else if ($products[$i]["stock"] > 10 && $products[$i]["stock"] <= 15) {
                $stock = "<button class='btn btn-sm btn-warning btn-block text-white'>" . $products[$i]["stock"] . "</button>";
            } else {
                $stock = "<button class='btn btn-sm btn-success btn-block'>" . $products[$i]["stock"] . "</button>";
            }


            $buttons = "<div class='btn-group d-flex'><button type='button' class='btn btn-sm btn-warning btnEditProduct' style='color:white;' idProduct='" . $products[$i]["id"] . "' data-toggle='modal' data-target='#modalEditProduct'><i class='fas fa-edit'></i></button><button type='button' class='btn btn-sm btn-danger btnDeleteProduct' idProduct='" . $products[$i]["id"] . "' description='" . $products[$i]["description"] . "' image='" . $products[$i]["image"] . "' data-toggle='modal' data-target='#modalDeleteProduct'><i class='fas fa-trash'></i></button></div>";

            // <button type='button' class='btn btn-sm btn-primary btnReadProduct' idProduct='" . $products[$i]["id"] . "' data-toggle='modal' data-target='#modalReadProduct'><i class='fas fa-eye'></i></button> BOTON READ PRODUCTO, VA ARRIBA AL PRINCIPIO

            $dataJson .= '[
                        "' . ($i + 1) . '",
                        "' . $image . '",
                        "' . $products[$i]["internal_code"] . '",
                        "' . $products[$i]["barcode"] . '",
                        "' . $products[$i]["description"] . '",
                        "' . $categories["name"] . '",
                        "$ ' . $products[$i]["selling_price"] . '",
                        "' . $stock . '",
                        "' . $locations["name"] . '",
                        "' . $buttons . '"
                    ],';
        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= ']


    }';

        echo $dataJson;
    }
}

//Activar tabla de productos
$activateProduct = new TableProducts();
$activateProduct->showTableProducts();
