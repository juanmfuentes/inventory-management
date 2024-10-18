<?php

require_once "../app/controllers/users.controller.php";
require_once "../app/models/users.model.php";

class AjaxUsers
{

    public $idUser;

    public function ajaxEditUser()
    {


        $item = "id";
        $value = $this->idUser;

        $response = ControllerUsers::ctrShowUsers($item, $value);

        echo json_encode($response);
    }

    public $activateId;
    public $activateUser;

    public function ajaxActivateUser()
    {

        $table = "users";

        $item1 = "status";
        $value1 = $this->activateUser;

        $item2 = "id";
        $value2 = $this->activateId;

        $response = UsersModel::mdlUpdateUser($table, $item1, $value1, $item2, $value2);
    }


    public $validateUser;

    public function ajaxValidateUser()
    {
        $item = "user";
        $value = $this->validateUser;

        $response = ControllerUsers::ctrShowUsers($item, $value);

        echo json_encode($response);
    }
}

if (isset($_POST["idUser"])) {

    $edit = new AjaxUsers();
    $edit->idUser = $_POST["idUser"];
    $edit->ajaxEditUser();
}

if (isset($_POST["activateUser"])) {

    $activateUser = new AjaxUsers();
    $activateUser->activateUser = $_POST["activateUser"];
    $activateUser->activateId = $_POST["activateId"];


    $activateUser->ajaxActivateUser();
}


if (isset($_POST["validateUser"])) {

    $valUser = new AjaxUsers();
    $valUser->validateUser = $_POST["validateUser"];

    $valUser->ajaxValidateUser();
}
