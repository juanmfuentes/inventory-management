<?php

require_once "connection.php";

class UsersModel
{

    static public function mdlShowUsers($table, $item, $value)
    {

        if ($item != null) {

            $stmt = dbConnection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

            $stmt->close();
        } else {

            $stmt = dbConnection::connect()->prepare("SELECT * FROM $table");

            $stmt->execute();

            return $stmt->fetchAll();
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlNewUser($table, $data)
    {
        $stmt = dbConnection::connect()->prepare("INSERT INTO $table(first_name, last_name, user, password, rol, status) 
        VALUES (:first_name, :last_name, :user, :password, :rol, :status)");

        $stmt->bindParam(":first_name", $data["first_name"], PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $data["last_name"], PDO::PARAM_STR);
        $stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $data["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $data["status"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditUser($table, $data)
    {
        $stmt = dbConnection::connect()->prepare("UPDATE $table SET first_name = :first_name, last_name = :last_name, user = :user, password = :password, rol = :rol WHERE id = :id");

        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":first_name", $data["first_name"], PDO::PARAM_STR);
        $stmt->bindParam(":last_name", $data["last_name"], PDO::PARAM_STR);
        $stmt->bindParam(":user", $data["user"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $data["rol"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $stmt = null;
    }


    static public function mdlUpdateUser($table, $item1, $value1, $item2, $value2)
    {

        $stmt = dbConnection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item1, $value1, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $value2, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlDeleteUser($table, $data)
    {

        $stmt = dbConnection::connect()->prepare("DELETE FROM $table WHERE id = :id");

        $stmt->bindParam(":id", $data, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $stmt = null;
    }
}
