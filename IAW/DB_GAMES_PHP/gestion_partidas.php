<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>/// MATCH_LOGS ///</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <style>
        /* ESTILOS DEDSEC */
        body {
            background-color: #0d0d0d;
            color: #33ff00;
            font-family: 'VT323', monospace;
            padding: 20px;
            background-image: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            background-size: 100% 2px, 3px 100%;
        }
        .container {
            max-width: 1000px; /* Un poco más ancho para que quepan los datos */
            margin: 0 auto;
            border: 2px solid #33ff00;
            padding: 20px;
            box-shadow: 0 0 15px #33ff00;
        }
        h1 { text-transform: uppercase; letter-spacing: 2px; text-shadow: 0 0 5px #33ff00; text-align: center; }
        
        /* BOTONES DE NAVEGACIÓN */
        a {
            color: #0d0d0d;
            background-color: #33ff00;
            text-decoration: none;
            padding: 5px 10px;
            font-weight: bold;
            text-transform: uppercase;
            display: inline-block;
        }
        a:hover { background-color: #fff; box-shadow: 0 0 10px #fff; }

        .top-nav { margin-bottom: 20px; text-align: center; }
        .top-nav a { margin: 0 10px; clip-path: polygon(10% 0, 100% 0, 100% 80%, 90% 100%, 0 100%, 0 20%); padding: 10px 20px; }

        /* TABLA */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #33ff00;
        }
        th, td {
            border: 1px solid #1a5c00;
            padding: 10px;
            text-align: left;
            font-size: 0.9em;
        }
        th {
            background-color: #1a5c00;
            color: #fff;
            text-transform: uppercase;
        }
        tr:hover { background-color: rgba(51, 255, 0, 0.1); }
        
        /* Enlaces de acción */
        td a {
            background: transparent;
            color: #33ff00;
            border: 1px solid #33ff00;
            padding: 2px 5px;
            font-size: 0.8em;
            margin-right: 5px;
        }
        td a:hover { background: #33ff00; color: #000; }
    </style>
</head>
<body>

<div class="container">
    <h1>/// SISTEMA_DE_REGISTRO_DE_PARTIDAS ///</h1>
    
    <div class="top-nav">
        <a href="index.php">- ATRAS</a>
        <a href="insertar_partida.php">+ INSERTAR_PARTIDA</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID_PARTIDA</th>
                <th>NOMBRE_PARTIDA</th>
                <th>FECHA</th>
                <th>JUEGO</th>
                <th>JUGADOR_1</th>
                <th>JUGADOR_2</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Usamos el LEFT JOIN para traer los nombres reales
        $sql = "SELECT 
                    PARTIDAS.*, 
                    G.NOMBRE AS NOMBRE_JUEGO, 
                    P1.ALIAS AS ALIAS_P1, 
                    P2.ALIAS AS ALIAS_P2 
                FROM PARTIDAS
                LEFT JOIN GAMES G ON PARTIDAS.ID_GAME = G.ID
                LEFT JOIN PLAYERS P1 ON PARTIDAS.ID_PLAYER1 = P1.ID
                LEFT JOIN PLAYERS P2 ON PARTIDAS.ID_PLAYER2 = P2.ID
                ORDER BY PARTIDAS.ID DESC"; // Ordenamos para ver las últimas primero

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>#" . $row["ID"] . "</td>";
                echo "<td><strong>" . $row["NOMBRE"] . "</strong></td>";
                echo "<td>" . $row["FECHA"] . "</td>";
                
                // Formato técnico: ID [Nombre]
                echo "<td>[" . $row["NOMBRE_JUEGO"] . "]</td>";
                echo "<td>" . $row["ALIAS_P1"] . "</td>";
                echo "<td>" . $row["ALIAS_P2"] . "</td>";
                
                echo "<td>
                        <a href='modificar_partida.php?id=" . $row["ID"] . "'>[ ACTUALIZAR ]</a> 
                        <a href='borrar_partida.php?id=" . $row["ID"] . "'>[ ELIMINAR ]</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7' style='text-align:center;'>/// NO LOGS FOUND ///</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>