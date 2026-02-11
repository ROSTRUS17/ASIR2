<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Al borrar un juego, se borrarán sus partidas automáticamente por la configuración CASCADE de la BD
    $sql = "DELETE FROM GAMES WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: gestion_games.php");
        exit();
    } else {
        echo "Error borrando: " . $conn->error;
    }
}
?>