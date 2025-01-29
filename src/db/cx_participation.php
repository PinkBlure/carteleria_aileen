<?php
require_once __DIR__ . '/base/cx_database.php';

$conn = createConnection();

if (!$conn) {
  header("Location: ../pages/participate.php?error=La conexión a la base de datos no se estableció correctamente.");
  exit();
}

try {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $pin = $_POST['pin'];
  $cial = $_POST['cial'];
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];

  // Verificar si el archivo fue cargado correctamente
  if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
    header("Location: ../pages/participate.php?error=Error al subir el archivo.");
    exit();
  }

  // Validar tipo de archivo (solo PDF)
  $allowedMimeTypes = ['application/pdf'];
  $fileType = mime_content_type($_FILES['imagen']['tmp_name']);

  if (!in_array($fileType, $allowedMimeTypes)) {
    header("Location: ../pages/participate.php?error=El archivo debe ser un PDF.");
    exit();
  }

  // Obtener contenido del PDF
  $imagenBlob = file_get_contents($_FILES['imagen']['tmp_name']);
  if (!$imagenBlob) {
    header("Location: ../pages/participate.php?error=No se pudo leer el archivo PDF.");
    exit();
  }

  // Comprobar que el usuario es válido
  $sqlValidar = "SELECT COUNT(*) AS usuario_valido FROM usuario WHERE cial = :cial AND pin = :pin";
  $stmt = $conn->prepare($sqlValidar);
  $stmt->bindParam(':cial', $cial, PDO::PARAM_STR);
  $stmt->bindParam(':pin', $pin, PDO::PARAM_STR);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result['usuario_valido'] <= 0) {
    header("Location: ../pages/participate.php?error=CIAL o PIN incorrectos");
    exit();
  }

  // Comprobar si ya ha participado
  $sqlComprobar = "SELECT COUNT(*) AS total FROM participacion WHERE id_usuario = :id_usuario";
  $stmt = $conn->prepare($sqlComprobar);
  $stmt->bindParam(':id_usuario', $cial, PDO::PARAM_STR);
  $stmt->execute();
  $cartelExistente = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($cartelExistente['total'] > 0) {
    header("Location: ../pages/participate.php?error=Un mismo usuario no puede participar dos veces");
    exit();
  }

  $conn->beginTransaction();

  // Insertar el cartel
  $sqlInsertarCartel = "INSERT INTO cartel (titulo, imagen, fecha, descripcion) VALUES (:titulo, :imagen, NOW(), :descripcion)";
  $stmt = $conn->prepare($sqlInsertarCartel);
  $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
  $stmt->bindParam(':imagen', $imagenBlob, PDO::PARAM_LOB);
  $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);

  if (!$stmt->execute()) {
    $conn->rollBack();
    header("Location: ../pages/participate.php?error=Error al insertar el cartel.");
    exit();
  }

  // Obtener el ID del cartel insertado
  $idCartel = $conn->lastInsertId();

  // Insertar la participación
  $sqlInsertarParticipacion = "INSERT INTO participacion (id_usuario, id_cartel, fecha) VALUES (:id_usuario, :id_cartel, NOW())";
  $stmt = $conn->prepare($sqlInsertarParticipacion);
  $stmt->bindParam(':id_usuario', $cial, PDO::PARAM_STR);
  $stmt->bindParam(':id_cartel', $idCartel, PDO::PARAM_INT);

  if (!$stmt->execute()) {
    $conn->rollBack();
    header("Location: ../pages/participate.php?error=Error al insertar la participación.");
    exit();
  }

  $conn->commit();

  header("Location: ../pages/participate.php?accept=Cartel entregado con éxito");
  exit();
} catch (Exception $e) {
  $conn->rollBack();
  header("Location: ../pages/participate.php?error=" . urlencode($e->getMessage()));
  exit();
}
