<?php
    // Comprobar si existe usuario, comprobar que no haya votado, comprobar que no haya participado.

    // Importacion de conexión a la base de datos
    require_once "cx_database.php";

    // Función para comprobar que los datos pasados por parámetro existen en la base de datos
    function checkUser($cial, $pin){
        try {
        // Crear conexión
        $conn = createConnection();

            // Query para obtener los datos
            $stmt = $conn->prepare("
                SELECT cial, pin
                FROM usuario
                where cial = :cial and pin = :pin;
            ");
            $stmt->execute(['cial' => strtoupper($cial), 'pin' => strtoupper($pin)]);
        
            $result = $stmt->fetchAll(PDO::FETCH_BOTH);

            if(count($result) > 0){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
        }
    }
    
    // Función para comprobar que el usuario cuyo cial es pasado por parámetro haya participado anteriormente
    function userParticiped($cial){
        try {
        // Crear conexión
        $conn = createConnection();

            // Query para obtener los datos
            $stmt = $conn->prepare("
                SELECT id_usuario
                FROM participacion p
                where id_usuario = :cial;
            ");
            $stmt->execute(['cial' => strtoupper($cial)]);
        
            $result = $stmt->fetchAll(PDO::FETCH_BOTH);

            if(count($result) > 0){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
        }
    }
    
    // Función para comprobar que el usuario cuyo cial es pasado por parámetro haya votado anteriormente
    function userVoted($cial){
        try {
        // Crear conexión
        $conn = createConnection();

            // Query para obtener los datos
            $stmt = $conn->prepare("
                SELECT id_usuario
                FROM votacion 
                where id_usuario = :cial;
            ");
            $stmt->execute(['cial' => strtoupper($cial)]);
        
            $result = $stmt->fetchAll(PDO::FETCH_BOTH);

            if(count($result) > 0){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error al realizar la consulta: " . $e->getMessage();
        }
    }
?>
