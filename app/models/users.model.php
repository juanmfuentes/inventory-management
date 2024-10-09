<?php

require_once "connection.php";

class UsersModel
{

    static public function mdlShowUsers($table, $item, $value)
    {

        $stmt = dbConnection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();
    }
}
