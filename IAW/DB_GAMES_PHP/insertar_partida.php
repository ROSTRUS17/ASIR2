<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php'; 

// Carga de datos para los desplegables
$sql_games = "SELECT ID, NOMBRE FROM GAMES";
$result_games = $conn->query($sql_games);

$sql_players = "SELECT ID, ALIAS FROM PLAYERS";
$result_players = $conn->query($sql_players);

$lista_jugadores = [];
if ($result_players->num_rows > 0) {
    while($row = $result_players->fetch_assoc()) {
        $lista_jugadores[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>/// NEW_MATCH ///</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <style>
        /* ESTILOS DEDSEC FORMULARIO */
        body {
            background-color: #0d0d0d;
            color: #33ff00;
            font-family: 'VT323', monospace;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            background-size: 100% 2px, 3px 100%;
        }
        .container {
            width: 550px;
            border: 2px solid #33ff00;
            padding: 40px;
            box-shadow: 0 0 20px #33ff00;
            background: rgba(0, 0, 0, 0.9);
        }
        h2 { 
            text-align: center; 
            border-bottom: 1px dashed #33ff00; 
            padding-bottom: 10px; 
            text-transform: uppercase;
        }

        /* ESTILOS DE INPUTS Y SELECTS */
        label { display: block; margin-top: 15px; font-size: 1.1em; color: #fff;}
        
        input[type="text"], input[type="date"], select {
            width: 100%;
            background-color: #000;
            border: 1px solid #33ff00;
            color: #33ff00;
            padding: 10px;
            font-family: 'VT323', monospace;
            font-size: 1.2em;
            margin-top: 5px;
            box-sizing: border-box;
        }
        
        input:focus, select:focus {
            outline: none;
            box-shadow: 0 0 10px #33ff00;
        }

        /* BOTÓN */
        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            background-color: #33ff00;
            color: #000;
            border: none;
            padding: 15px;
            font-family: 'VT323', monospace;
            font-size: 1.5em;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            clip-path: polygon(5% 0, 100% 0, 100% 80%, 95% 100%, 0 100%, 0 20%);
        }
        input[type="submit"]:hover {
            background-color: #fff;
            box-shadow: 0 0 15px #fff;
        }

        .back-link {
            display: block;
            margin-bottom: 20px;
            color: #33ff00;
            text-decoration: none;
            font-size: 1.2em;
        }
        .back-link:hover { text-decoration: underline; text-shadow: 0 0 5px #33ff00; }
    </style>
</head>
<body>

<div class="container">
    <a href="gestion_partidas.php" class="back-link"><< ATRAS</a>

    <h2>/// PROTOCOLO_INSERTAR_PARTIDA ///</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $fecha = $_POST['fecha'];
        $id_game = $_POST['id_game'];
        $id_p1 = $_POST['id_p1'];
        $id_p2 = $_POST['id_p2'];
        
        if ($id_p1 == $id_p2) {
            echo "<p style='color:red; text-align:center;'> >> ERROR: AGENT CONFLICT (SAME ID) << </p>";
        } else {
            $sql = "INSERT INTO PARTIDAS (ID_GAME, ID_PLAYER1, ID_PLAYER2, NOMBRE, FECHA) 
                    VALUES ('$id_game', '$id_p1', '$id_p2', '$nombre', '$fecha')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color:#fff; background:#1a5c00; padding:10px; text-align:center;'> >> MATCH LOGGED SUCCESSFULLY << </p>";
            } else {
                echo "<p style='color:red; text-align:center;'> >> DATABASE ERROR << <br>" . $conn->error . "</p>";
            }
        }
    }
    ?>

    <form method="post" action="">
        <label>> NOMBRE_PARTIDA:</label>
        <input type="text" name="nombre" required placeholder="_Nombre_partida" autocomplete="off">
        
        <label>> FECHA:</label>
        <input type="date" name="fecha" required>

        <label>> SELECCIONAR_JUEGO:</label>
        <select name="id_game" required>
            <option value="">-- ESPERANDO INPUT --</option>
            <?php
            if ($result_games->num_rows > 0) {
                while($game = $result_games->fetch_assoc()) {
                    echo "<option value='" . $game['ID'] . "'>" . $game['NOMBRE'] . "</option>";
                }
            }
            ?>
        </select>

        <label>> JUGADOR_1:</label>
        <select name="id_p1" required>
            <option value="">-- ESPERANDO INPUT --</option>
            <?php
            foreach ($lista_jugadores as $player) {
                echo "<option value='" . $player['ID'] . "'>" . $player['ALIAS'] . "</option>";
            }
            ?>
        </select>

        <label>> JUGADOR_2:</label>
        <select name="id_p2" required>
            <option value="">-- ESPERANDO INPUT --</option>
            <?php
            foreach ($lista_jugadores as $player) {
                echo "<option value='" . $player['ID'] . "'>" . $player['ALIAS'] . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="SUBIR_DATOS_PARTIDA">
    </form>
</div>

</body>
</html>