<?php
    // Importacion de conexión a la base de datos
    require_once "base/cx_database.php";

    
    // Función para obtener los carteles ganadores
    function getResults(){
        // Crear conexión
        $conn = createConnection();
        
        try {
            // Query para obtener los datos
            $stmt = $conn->prepare("
                SELECT u.nombre, u.curso, c.titulo, c.descripcion, c.imagen, (SELECT DISTINCT COUNT(1) from votacion where id_cartel = c.id) votos 
                FROM usuario u, cartel c, participacion p 
                WHERE u.cial = p.id_usuario AND p.id_cartel = c.id
                ORDER BY votos DESC
                LIMIT 3;
            ");
            $stmt->execute();
        
            return $stmt->fetchAll(PDO::FETCH_BOTH);
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
        }
    }

?>