<?php

require_once "../app/controllers/suppliers.controller.php";
require_once "../app/models/suppliers.model.php";

class AjaxSuppliers
{

    public $idSupplier;

    public function ajaxEditSupplier()
    {


        $item = "id";
        $value = $this->idSupplier;

        $response = ControllerSuppliers::ctrShowSuppliers($item, $value);

        echo json_encode($response);
    }
}

if (isset($_POST["idSupplier"])) {

    $edit = new AjaxSuppliers();
    $edit->idSupplier = $_POST["idSupplier"];
    $edit->ajaxEditSupplier();
}
