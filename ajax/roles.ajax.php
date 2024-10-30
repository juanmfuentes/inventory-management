<?php

require_once "../app/controllers/roles.controller.php";
require_once "../app/models/roles.model.php";

class AjaxRoles
{

    public $idRole;

    public function ajaxEditRole()
    {


        $item = "id";
        $value = $this->idRole;

        $response = ControllerRoles::ctrShowRoles($item, $value);

        echo json_encode($response);
    }
}

if (isset($_POST["idRole"])) {

    $edit = new AjaxRoles();
    $edit->idRole = $_POST["idRole"];
    $edit->ajaxEditRole();
}
