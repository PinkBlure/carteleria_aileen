<?php

require_once "base/cx_database.php";
require_once "base/cx_user_check.php";
enableErrorLog();

$cial = $_POST['cial'];
$pin = $_POST['pin'];
$id_cartel = $_POST['id'];

if (checkUser($cial, $pin)) {
  if (!userVoted($cial)) {
    try {
      $conn = createConnection();

      $stmt = $conn->prepare("
        INSERT INTO votacion (id_usuario, id_cartel)
        VALUES (:cial, :id_cartel);
      ");
      $stmt->execute(['cial' => strtoupper($cial), 'id_cartel' => strtoupper($id_cartel)]);

      header("Location: ../pages/vote.php?id=" . $id_cartel . "&accept=Se ha realizado la votación");

    } catch (PDOException $e) {
      header("Location: ../pages/vote.php?id=". $id_cartel . "&error=" . $e->getMessage());
      exit();
    }
  } else {
    header("Location: ../pages/vote.php?id=". $id_cartel ."&error=Este usuario ya ha votado");
    exit();
  }
} else {
  header("Location: ../pages/vote.php?id=". $id_cartel ."&error=Error en el CIAL o en el PIN, comprueba los datos");
  exit();
}
