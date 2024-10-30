<?php

require_once "../app/controllers/products.controller.php";
require_once "../app/models/products.model.php";

class AjaxProducts {

    public $idProduct;

    public function ajaxEditProduct()
    {


        $item = "id";
        $value = $this->idProduct;

        $response = ControllerProducts::ctrShowProducts($item, $value);

        echo json_encode($response);
    }
}

if (isset($_POST["idProduct"])) {

    $edit = new AjaxProducts();
    $edit->idProduct = $_POST["idProduct"];
    $edit->ajaxEditProduct();
}
