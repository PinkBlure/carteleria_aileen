<?php
require_once __DIR__ . '/base/cx_database.php';

$conn = createConnection();

if (!isset($conn) || $conn === null) {
    die("Error: La conexión a la base de datos no se estableció correctamente.");
}

try {
    // Habilitar excepciones en PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pin = $_POST['pin'];
    $cial = $_POST['cial'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen']['tmp_name'];

    // Validar usuario
    $sqlValidar = "SELECT COUNT(*) AS usuario_valido FROM usuario WHERE cial = :cial AND pin = :pin";
    $stmt = $conn->prepare($sqlValidar);

    $stmt->bindParam(':cial', $cial, PDO::PARAM_STR);
    $stmt->bindParam(':pin', $pin, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['usuario_valido'] > 0) {
        // Comprobar si ya existe un cartel para este usuario xd
        $sqlComprobar = "SELECT COUNT(*) AS total
        FROM participacion
        WHERE id_usuario = :id_usuario";
        $stmt = $conn->prepare($sqlComprobar);
        $stmt->bindParam(':id_usuario', $cial, PDO::PARAM_STR);
        $stmt->execute();

        $cartelExistente = $stmt->fetch(PDO::FETCH_ASSOC);

        // if (count($cartelExistente) > 0) {
        //     echo "Solo puedes insertar un cartel.";
        // } else {
            $imagenBlob = file_get_contents($imagen);

            $sqlInsertar = "INSERT INTO cartel (titulo, imagen, fecha, descripcion) VALUES (:titulo, :imagen, CURDATE(), :descripcion)";
            $stmt = $conn->prepare($sqlInsertar);

            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->bindParam(':imagen', $imagenBlob, PDO::PARAM_LOB);
            $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "¡Cartel añadido exitosamente!";
            } else {
                echo "Error al insertar el cartel.";
            }
        // }
    } else {
        echo "CIAL o PIN incorrectos.";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
