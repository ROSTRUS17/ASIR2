<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // SQL para borrar
    $sql = "DELETE FROM PLAYERS WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirigir automáticamente tras borrar
        header("Location: gestion_players.php");
        exit();
    } else {
        echo "Error borrando: " . $conn->error;
    }
}
?>