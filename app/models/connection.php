<?php

class dbConnection
{
    static public function connect()
    {

        $link = new PDO(
            "mysql:host=localhost;dbname=refaccionaria_don_lalo",
            "root",
            ""
        );

        $link->exec("set names utf8");

        return $link;
    }
}
