<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM PARTIDAS WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: gestion_partidas.php");
        exit();
    } else {
        echo "Error borrando: " . $conn->error;
    }
}
?>