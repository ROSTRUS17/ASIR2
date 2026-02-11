<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "BD_GAMES"; // Aquí defines el nombre en la variable $dbname

// Crear conexión
// CORRECCIÓN: Usamos $dbname, no $BD_GAMES
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Fallo en la conexión: " . $conn->connect_error);
}
// Si no sale nada en pantalla, es que conectó bien.
?>