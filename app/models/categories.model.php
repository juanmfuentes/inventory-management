<?php

require_once "connection.php";

class CategoriesModel
{

    static public function mdlNewCategory($table, $data)
    {
        $stmt = dbConnection::connect()->prepare("INSERT INTO $table(name, description) 
        VALUES (:name, :description)");

        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlShowCategories($table, $item, $value)
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

    static public function mdlEditCategory($table, $data)
    {
        $stmt = dbConnection::connect()->prepare("UPDATE $table SET name = :name, description = :description WHERE id = :id");

        $stmt->bindParam(":id", $data["id"], PDO::PARAM_STR);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlDeleteCategory($table, $data)
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
