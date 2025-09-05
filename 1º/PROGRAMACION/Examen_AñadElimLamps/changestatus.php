<?php
require_once 'clases/Connection.php';

// Iniciar sesion para mantener el filtro
session_start();

// Verifica que haya recibido el parametro id por GET
if (isset($_GET['id'])) {
    $lampId = intval($_GET['id']);

    // Crea conexion
    $connection = new Connection();
    $conn = $connection->connect(); // Obtener el objeto PDO

    // Consultar el estado actual de la lampara
    $sql = "SELECT lamp_on FROM lamps WHERE lamp_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$lampId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $currentStatus = $row['lamp_on'];
        $newStatus = $currentStatus ? 0 : 1; // Intertir estado 

        // Actualizar estado
        $updateSql = "UPDATE lamps SET lamp_on = ? WHERE lamp_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->execute([$newStatus, $lampId]);
    }
}

// Redirigir a la página principal (se mantiene el filtro usando sesión)
header("Location: index.php");
exit;
?>
