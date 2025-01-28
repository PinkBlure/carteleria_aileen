<?php
    file_exists("../db/cx_alert.php") ? require_once "../db/cx_alert.php" : require_once "src/db/cx_alert.php";

    $plazoActual = getPlazoActual();
    $diasRestantes = getDiasRestantes();

    switch ($plazoActual) {
        case 1:
            echo "<p>¡ATENCIÓN! Quedan " . $diasRestantes . " días para que acabe la presentación de candidaturas.</p>";
            break;
        case 2:
            echo "<p>¡ATENCIÓN! Quedan " . $diasRestantes . " días para que acabe el periodo de votación.</p>";
            break;
        case 3:
            echo "";
            break;
    }
?>