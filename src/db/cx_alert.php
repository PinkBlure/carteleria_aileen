<?php

require_once "base/cx_database.php";

/**
 * Devuelve el plazo actual (1, 2 o 3).
 *
 * @return int
 */
function getPlazoActual() {
    $conn = createConnection();

    if (!$conn) {
        error_log("No se pudo establecer la conexión a la base de datos.");
        return 3; // Retornamos 3 por defecto si hay error en la conexión.
    }

    $query = "SELECT fecha FROM fecha ORDER BY id ASC";

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $fechas = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (count($fechas) < 3) {
            error_log("No hay suficientes fechas en la tabla para calcular el plazo.");
            return 3;
        }

        $fechaActual = new DateTime();
        $fecha1 = new DateTime($fechas[0]);
        $fecha2 = new DateTime($fechas[1]);
        $fecha3 = new DateTime($fechas[2]);

        if ($fechaActual >= $fecha1 && $fechaActual < $fecha2) {
            return 1;
        } elseif ($fechaActual >= $fecha2 && $fechaActual < $fecha3) {
            return 2;
        } else {
            return 3;
        }
    } catch (PDOException $ex) {
        error_log("Error al ejecutar la consulta: " . $ex->getMessage());
        return 3;
    } finally {
        $conn = null;
    }
}

/**
 * Devuelve la diferencia de días para que se acabe el plazo actual.
 *
 * @return int|null Devuelve el número de días o null si no se puede calcular.
 */
function getDiasRestantes() {
    $conn = createConnection();

    if (!$conn) {
        error_log("No se pudo establecer la conexión a la base de datos.");
        return null; // Retornamos null si hay error en la conexión.
    }

    $query = "SELECT fecha FROM fecha ORDER BY id ASC";

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $fechas = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (count($fechas) < 3) {
            error_log("No hay suficientes fechas en la tabla para calcular los días restantes.");
            return null;
        }

        $fechaActual = new DateTime();
        $fecha1 = new DateTime($fechas[0]);
        $fecha2 = new DateTime($fechas[1]);
        $fecha3 = new DateTime($fechas[2]);

        if ($fechaActual >= $fecha1 && $fechaActual < $fecha2) {
            return $fechaActual->diff($fecha2)->days;
        } elseif ($fechaActual >= $fecha2 && $fechaActual < $fecha3) {
            return $fechaActual->diff($fecha3)->days;
        } else {
            return null; // No estamos en ningún plazo definido.
        }
    } catch (PDOException $ex) {
        error_log("Error al ejecutar la consulta: " . $ex->getMessage());
        return null;
    } finally {
        $conn = null;
    }
}

?>
