<?php

namespace Core;
use PDO;
class Model
{
    public static function dbConnect()
    {
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mvc";
        $dsn = "mysql:host=$hostname;dbname=$dbname";
        $pdo = new PDO($dsn, $username, $password);

        return $pdo;
    }
}