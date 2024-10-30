<?php

require_once "../app/controllers/brands.controller.php";
require_once "../app/models/brands.model.php";

class AjaxBrands
{

    public $idBrand;

    public function ajaxEditBrand()
    {


        $item = "id";
        $value = $this->idBrand;

        $response = ControllerBrands::ctrShowBrands($item, $value);

        echo json_encode($response);
    }
}

if (isset($_POST["idBrand"])) {

    $edit = new AjaxBrands();
    $edit->idBrand = $_POST["idBrand"];
    $edit->ajaxEditBrand();
}
