<?php
namespace app\_utils;

use PDO;
use PDOException;


class Database
{ 
    public function getConnection()
    {
        try {
            $dsn = "mysql:host=127.0.0.1;dbname=booking_system;charset=utf8;port=3306";
            $user = "root";
            $password = "";
            $conn = new \PDO($dsn, $user, $password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $ex) {
            die("Adatbázis kapcsolat hiba: " . $ex->getMessage());
        }
    }
}
