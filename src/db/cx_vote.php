<?php
    // Importacion de conexión a la base de datos y funciones de comprobación
    require_once "base/cx_database.php";
    require_once "base/cx_user_check.php";
    enableErrorLog();

    $cial = $_POST['cial'];
    $pin = $_POST['pin'];
    $id_cartel = $_POST['id_cartel'];

    if(checkUser($cial, $pin)){
        if(!userVoted($cial)){
            try {
                    // Crear conexión
                    $conn = createConnection();
        
                    // Query para obtener los datos
                    $stmt = $conn->prepare("
                        INSERT INTO votacion (id_usuario, id_cartel)
                        VALUES (:cial, :id_cartel);
                    ");
                    $stmt->execute(['cial' => strtoupper($cial), 'id_cartel' => strtoupper($id_cartel)]);

                    // Pasará un valor por Get[message] con valor voted cuando la votacion se haya completado con éxito
                    header("Location: ../pages/vote.php?message=voted");
                } catch (PDOException $e) {
                    echo "Error al insertar los datos: " . $e->getMessage();
                }
        } else {
            // Pasará un valor por Get[message] con valor userVoted cuando el usuario ya haya votado con anterioridad
            header("Location: ../pages/vote.php?message=userVoted");
        }
    } else {
        // Pasará un valor por Get[message] con valor userNotValid cuando el usuario introducido no se encuentre en la base de datos
        header("Location: ../pages/vote.php?message=userNotValid");
    }
?>
