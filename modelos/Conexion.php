<?php

try {

    class conexion
    {

        static public function conectar()
        {

            $link = new PDO("mysql:host=localhost;dbname=gym", "root", "");
            $link->exec("set names utf8");
            return $link;
        }
    }
} catch (Exception $e) {
    return "Error: " . $e->getMessage();
}
