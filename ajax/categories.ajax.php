<?php

require_once "../app/controllers/categories.controller.php";
require_once "../app/models/categories.model.php";

class AjaxCategories
{

    public $idCategory;

    public function ajaxEditCategory()
    {


        $item = "id";
        $value = $this->idCategory;

        $response = ControllerCategories::ctrShowCategories($item, $value);

        echo json_encode($response);
    }
}

if (isset($_POST["idCategory"])) {

    $edit = new AjaxCategories();
    $edit->idCategory = $_POST["idCategory"];
    $edit->ajaxEditCategory();
}
