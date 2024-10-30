<?php

require_once "connection.php";

class ProductsModel
{

    static public function mdlNewProduct($table, $data)
    {
        $stmt = dbConnection::connect()->prepare("INSERT INTO $table(image, description, internal_code, barcode, brand, category, location, supplier, selling_price, stock, purchase_price, purchase_with_vat, extra_1, extra_2, extra_3, extra_4)
        VALUES (:image, :description, :internal_code, :barcode, :brand, :category, :location, :supplier, :selling_price, :stock, :purchase_price, :purchase_with_vat, :extra_1, :extra_2, :extra_3, :extra_4)");

        $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindParam(":internal_code", $data["internal_code"], PDO::PARAM_STR);
        $stmt->bindParam(":barcode", $data["barcode"], PDO::PARAM_STR);
        $stmt->bindParam(":brand", $data["brand"], PDO::PARAM_STR);
        $stmt->bindParam(":category", $data["category"], PDO::PARAM_STR);
        $stmt->bindParam(":location", $data["location"], PDO::PARAM_STR);
        $stmt->bindParam(":supplier", $data["supplier"], PDO::PARAM_STR);
        $stmt->bindParam(":selling_price", $data["selling_price"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
        $stmt->bindParam(":purchase_price", $data["purchase_price"], PDO::PARAM_STR);
        $stmt->bindParam(":purchase_with_vat", $data["purchase_with_vat"], PDO::PARAM_STR);
        $stmt->bindParam(":extra_1", $data["extra_1"], PDO::PARAM_STR);
        $stmt->bindParam(":extra_2", $data["extra_2"], PDO::PARAM_STR);
        $stmt->bindParam(":extra_3", $data["extra_3"], PDO::PARAM_STR);
        $stmt->bindParam(":extra_4", $data["extra_4"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlShowProducts($table, $item, $value)
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

    static public function mdlEditProduct($table, $data)
    {
        $stmt = dbConnection::connect()->prepare("UPDATE $table SET image = :image, description = :description, internal_code = :internal_code, barcode = :barcode, brand = :brand, category = :category, location = :location, supplier = :supplier, selling_price = :selling_price, stock = :stock, purchase_price = :purchase_price, purchase_with_vat = :purchase_with_vat, extra_1 = :extra_1, extra_2 = :extra_2 , extra_3 = :extra_3, extra_4 = :extra_4 WHERE id = :id");

        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
        $stmt->bindParam(":image", $data["image"], PDO::PARAM_STR);
        $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
        $stmt->bindParam(":internal_code", $data["internal_code"], PDO::PARAM_STR);
        $stmt->bindParam(":barcode", $data["barcode"], PDO::PARAM_STR);
        $stmt->bindParam(":brand", $data["brand"], PDO::PARAM_STR);
        $stmt->bindParam(":category", $data["category"], PDO::PARAM_STR);
        $stmt->bindParam(":location", $data["location"], PDO::PARAM_STR);
        $stmt->bindParam(":supplier", $data["supplier"], PDO::PARAM_STR);
        $stmt->bindParam(":selling_price", $data["selling_price"], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $data["stock"], PDO::PARAM_STR);
        $stmt->bindParam(":purchase_price", $data["purchase_price"], PDO::PARAM_STR);
        $stmt->bindParam(":purchase_with_vat", $data["purchase_with_vat"], PDO::PARAM_STR);
        $stmt->bindParam(":extra_1", $data["extra_1"], PDO::PARAM_STR);
        $stmt->bindParam(":extra_2", $data["extra_2"], PDO::PARAM_STR);
        $stmt->bindParam(":extra_3", $data["extra_3"], PDO::PARAM_STR);
        $stmt->bindParam(":extra_4", $data["extra_4"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlDeleteProduct($table, $data)
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
