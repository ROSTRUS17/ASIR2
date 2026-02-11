<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php'; 

// 1. Obtener datos actuales de la partida
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM PARTIDAS WHERE ID=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// 2. Obtener listas para los desplegables (Juegos y Jugadores)
$sql_games = "SELECT ID, NOMBRE FROM GAMES";
$result_games = $conn->query($sql_games);

$sql_players = "SELECT ID, ALIAS FROM PLAYERS";
$result_players = $conn->query($sql_players);

// Guardamos jugadores en un array para reutilizar la lista
$lista_jugadores = [];
if ($result_players->num_rows > 0) {
    while($p = $result_players->fetch_assoc()) {
        $lista_jugadores[] = $p;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>/// EDIT_LOG ///</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <style>
        /* ESTILOS DEDSEC */
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
            width: 500px;
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

        label { display: block; margin-top: 15px; font-size: 1.2em; }
        
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
        input:focus, select:focus { outline: none; box-shadow: 0 0 10px #33ff00; }

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
        input[type="submit"]:hover { background-color: #fff; box-shadow: 0 0 15px #fff; }

        .back-link {
            display: block;
            margin-bottom: 20px;
            color: #33ff00;
            text-decoration: none;
            font-size: 1.2em;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="gestion_partidas.php" class="back-link"><< ATRAS</a>

    <h2>/// ACTUALIZAR_PARTIDA ///</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_update = $_POST['id'];
        $nombre = $_POST['nombre'];
        $id_game = $_POST['id_game']; // Ahora viene del desplegable
        $id_p1 = $_POST['id_p1'];
        $id_p2 = $_POST['id_p2'];
        $fecha = $_POST['fecha'];
        
        // Validación básica
        if ($id_p1 == $id_p2) {
             echo "<p style='color:red; text-align:center;'> >> ERROR: MISMO JUGADOR 2 VECES << </p>";
        } else {
            $sql_update = "UPDATE PARTIDAS SET 
                            NOMBRE='$nombre', 
                            ID_GAME='$id_game',
                            ID_PLAYER1='$id_p1', 
                            ID_PLAYER2='$id_p2', 
                            FECHA='$fecha' 
                           WHERE ID=$id_update";
            
            if ($conn->query($sql_update) === TRUE) {
                echo "<p style='color:#fff; background:#1a5c00; padding:10px; text-align:center;'> >> PARTIDA ACTUALIZADA << </p>";
                // Actualizamos variables para ver el cambio al instante
                $row['NOMBRE'] = $nombre;
                $row['ID_GAME'] = $id_game;
                $row['ID_PLAYER1'] = $id_p1;
                $row['ID_PLAYER2'] = $id_p2;
                $row['FECHA'] = $fecha;
            } else {
                echo "<p style='color:red;'>ERROR: " . $conn->error . "</p>";
            }
        }
    }
    ?>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

        <label>> NOMBRE_PARTIDA:</label>
        <input type="text" name="nombre" value="<?php echo $row['NOMBRE']; ?>" required>

        <label>> JUEGO:</label>
        <select name="id_game" required>
            <?php
            if ($result_games->num_rows > 0) {
                while($g = $result_games->fetch_assoc()) {
                    // Si el ID del juego coincide con el de la partida, le ponemos 'selected'
                    $selected = ($g['ID'] == $row['ID_GAME']) ? 'selected' : '';
                    echo "<option value='" . $g['ID'] . "' $selected>" . $g['NOMBRE'] . "</option>";
                }
            }
            ?>
        </select>

        <label>> JUGADOR_1:</label>
        <select name="id_p1" required>
            <?php
            foreach ($lista_jugadores as $p) {
                $selected = ($p['ID'] == $row['ID_PLAYER1']) ? 'selected' : '';
                echo "<option value='" . $p['ID'] . "' $selected>" . $p['ALIAS'] . "</option>";
            }
            ?>
        </select>

        <label>> JUGADOR_2:</label>
        <select name="id_p2" required>
            <?php
            foreach ($lista_jugadores as $p) {
                $selected = ($p['ID'] == $row['ID_PLAYER2']) ? 'selected' : '';
                echo "<option value='" . $p['ID'] . "' $selected>" . $p['ALIAS'] . "</option>";
            }
            ?>
        </select>
        
        <label>> FECHA:</label>
        <input type="date" name="fecha" value="<?php echo $row['FECHA']; ?>" required>

        <input type="submit" value="ACTUALIZAR_PARTIDA">
    </form>
</div>

</body>
</html>