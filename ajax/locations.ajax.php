<?php

require_once "../app/controllers/locations.controller.php";
require_once "../app/models/locations.model.php";

class AjaxLocations
{

    public $idLocation;

    public function ajaxEditLocation()
    {


        $item = "id";
        $value = $this->idLocation;

        $response = ControllerLocations::ctrShowLocations($item, $value);

        echo json_encode($response);
    }
}

if (isset($_POST["idLocation"])) {

    $edit = new AjaxLocations();
    $edit->idLocation = $_POST["idLocation"];
    $edit->ajaxEditLocation();
}
