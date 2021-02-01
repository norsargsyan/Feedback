<?php

namespace Core;

use PDO;
use PDOException;

class Model {

  public static function dbConnect() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mvc";

    try {
      $connection = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
      $status = $connection->getAttribute(PDO::ATTR_CONNECTION_STATUS);
      if ($status) {
        return $connection;
      }
    } catch (PDOException $e) {
      $connection = new PDO("mysql:host=$hostname;", $username, $password);
      $templine = '';
      $lines = file('CreateDB.sql');
      foreach ($lines as $line) {
        if (substr($line, 0, 2) == '--' || $line == '') {
          continue;
        }
        $templine .= $line;
        if (substr(trim($line), -1, 1) == ';') {
          $connection->query($templine);
          $templine = '';
        }
      }
      $connection = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
      $status = $connection->getAttribute(PDO::ATTR_CONNECTION_STATUS);
      if ($status) {
        return $connection;
      }
      self::dbConnect();
    }
  }

}