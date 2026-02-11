<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>/// DEDSEC_DB_CONTROL ///</title>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    
    <style>
        /* ESTILO GENERAL HACKER */
        body {
            background-color: #0d0d0d;
            color: #33ff00; /* Verde Hacker */
            font-family: 'VT323', monospace;
            margin: 0;
            padding: 20px;
            text-shadow: 0 0 5px #33ff00; /* Efecto brillo neón */
            background-image: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            background-size: 100% 2px, 3px 100%; /* Efecto líneas de TV antigua */
        }

        h1, h2, h3 {
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            border: 2px solid #33ff00;
            padding: 20px;
            box-shadow: 0 0 20px #33ff00;
            position: relative;
        }

        /* ARTE ASCII */
        .ascii-art {
            white-space: pre;
            font-family: monospace;
            font-size: 14px; /* Un poco más grande para que la calavera se vea bien */
            line-height: 14px;
            text-align: center;
            color: #f0f0f0;
            margin-bottom: 20px;
            font-weight: bold;
        }

        /* MENÚ DE BOTONES */
        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .menu a {
            text-decoration: none;
            color: #000;
            background-color: #33ff00;
            padding: 15px 30px;
            font-size: 1.5em;
            font-weight: bold;
            border: 2px solid #33ff00;
            transition: all 0.3s ease;
            text-transform: uppercase;
            clip-path: polygon(10% 0, 100% 0, 100% 80%, 90% 100%, 0 100%, 0 20%); /* Forma recortada */
        }

        .menu a:hover {
            background-color: #000;
            color: #33ff00;
            box-shadow: inset 0 0 20px #33ff00;
            cursor: pointer;
        }

        /* PANEL DE ESTADÍSTICAS */
        .stats {
            border: 1px dashed #33ff00;
            padding: 20px;
            background: rgba(0, 255, 0, 0.05);
        }

        .stat-line {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #1a5c00;
            padding: 10px 0;
        }

        .stat-line:last-child {
            border-bottom: none;
        }

        .number {
            font-weight: bold;
            color: #fff;
        }
        
        /* Efecto parpadeo */
        .blink {
            animation: blinker 1s linear infinite;
        }
        @keyframes blinker {
            50% { opacity: 0; }
        }
    </style>
</head>
<body>

    <div class="container">
        
        <div class="ascii-art">
    .|____|.  
  .n$$$$$$$$n.
  .$$^$$$$$$^$$.
  $$$  $$$$  $$$
  '$$b.$$$$.d$$'
  '$$$$$$$$$$'
  '$$$$$$$$'
  '$$$$$$'
  '$$$$'
  '$$'
               
 \\\ USER: ADMIN_ROOT ///
 -----------------
        </div>

        <h1 style="text-align:center;">>_DB_GAMES<span class="blink">_</span></h1>

        <hr style="border-color: #33ff00;">
        <br>

        <div class="menu">
            <a href="gestion_players.php">[ JUGADORES ]</a>
            <a href="gestion_games.php">[ JUEGOS ]</a>
            <a href="gestion_partidas.php">[ PARTIDAS ]</a>
        </div>

        <?php
        // Consultas básicas de conteo
        $total_games = $conn->query("SELECT COUNT(*) as c FROM GAMES")->fetch_assoc()['c'];
        $total_players = $conn->query("SELECT COUNT(*) as c FROM PLAYERS")->fetch_assoc()['c'];
        $total_partidas = $conn->query("SELECT COUNT(*) as c FROM PARTIDAS")->fetch_assoc()['c'];

        // LOGICA COMPLEJA
        $sql_participacion = "
            SELECT player_id, COUNT(*) as cantidad FROM (
                SELECT ID_PLAYER1 as player_id FROM PARTIDAS
                UNION ALL
                SELECT ID_PLAYER2 as player_id FROM PARTIDAS
            ) as total_participaciones
            GROUP BY player_id
        ";
        
        $result = $conn->query($sql_participacion);
        
        $jugan_2 = 0;
        $jugan_3 = 0;
        $jugan_mas_3 = 0;

        if ($result) {
            while($row = $result->fetch_assoc()) {
                $cant = $row['cantidad'];
                if ($cant == 2) { $jugan_2++; }
                if ($cant == 3) { $jugan_3++; }
                if ($cant > 3) { $jugan_mas_3++; }
            }
        }
        ?>

        <div class="stats">
            <h2>/// DIAGNOSTICOS ///</h2>
            
            <div class="stat-line">
                <span>TOTAL JUEGOS :</span>
                <span class="number"><?php echo $total_games; ?></span>
            </div>
            <div class="stat-line">
                <span>TOTAL JUGADORES:</span>
                <span class="number"><?php echo $total_players; ?></span>
            </div>
            <div class="stat-line">
                <span> PARTIDAS TOTALES:</span>
                <span class="number"><?php echo $total_partidas; ?></span>
            </div>
            
            <br>
            <h3>>> ACTIVIDAD:</h3>
            
            <div class="stat-line">
                <span>Jugadores en 2 Partidas:</span>
                <span class="number"><?php echo $jugan_2; ?></span>
            </div>
            <div class="stat-line">
                <span>Jugadores en 3 Partidas:</span>
                <span class="number"><?php echo $jugan_3; ?></span>
            </div>
            <div class="stat-line">
                <span>Jugadores en > 3 Partidas:</span>
                <span class="number"><?php echo $jugan_mas_3; ?></span>
            </div>
        </div>
        
        <p style="text-align: center; margin-top: 20px; font-size: 0.8em;">/// CONNECTED TO SECURE SERVER ///</p>

    </div>

</body>
</html>