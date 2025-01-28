<?php
    // Importacion de conexión a la base de datos
    require_once "base/cx_database.php";

    
    // Función para obtener las fechas y sus descripciones
    function getDates(){
        
        try {
            // Crear conexión
        	$conn = createConnection();
                
            // Query para obtener los datos
            $stmt = $conn->prepare("
                SELECT fecha, descripcion
                FROM fecha;
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
        }
    }

?>
