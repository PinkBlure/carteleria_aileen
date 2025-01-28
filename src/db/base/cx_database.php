<?php

function enableErrorLog()
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
  return true;
}

function createConnection()
{
  try {
    $host = "localhost";
    $db = "carteleria";
    $user = "root";
    $pass = "";
    $dns = "mysql:host=$host;dbname=$db";
    $conn = new PDO($dns, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch (PDOException $ex) {
    error_log("Error en la conexión a la base de datos: " .
      $ex->getMessage());
    return null;
  }
}
