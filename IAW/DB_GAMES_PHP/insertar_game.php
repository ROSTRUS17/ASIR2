<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>/// UPLOAD_GAME ///</title>
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
            height: 100vh;
            background-image: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            background-size: 100% 2px, 3px 100%;
        }
        .container {
            width: 500px;
            border: 2px solid #33ff00;
            padding: 40px;
            box-shadow: 0 0 20px #33ff00;
            background: rgba(0, 0, 0, 0.8);
        }
        h2 { 
            text-align: center; 
            border-bottom: 1px dashed #33ff00; 
            padding-bottom: 10px; 
            text-transform: uppercase;
        }

        /* INPUTS ESTILO TERMINAL */
        label { display: block; margin-top: 15px; font-size: 1.2em; }
        
        input[type="text"] {
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
        input[type="text"]:focus {
            outline: none;
            box-shadow: 0 0 10px #33ff00;
        }

        /* BOTÓN DE ENVÍO */
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
    <a href="gestion_games.php" class="back-link"><< ATRAS</a>

    <h2>/// INSERTAR_JUEGO ///</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $genero = $_POST['genero'];
        
        $sql = "INSERT INTO GAMES (NOMBRE, GENERO) VALUES ('$nombre', '$genero')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:#fff; background:#1a5c00; padding:10px; text-align:center;'> >> GAME SUCCESSFULLY INSTALLED << </p>";
        } else {
            echo "<p style='color:red; text-align:center;'> >> FATAL ERROR << <br>" . $conn->error . "</p>";
        }
    }
    ?>

    <form method="post" action="">
        <label>> NOMBRE_JUEGO:</label>
        <input type="text" name="nombre" required placeholder="_Insertar_Titulo" autocomplete="off">
        
        <label>> GENERO:</label>
        <input type="text" name="genero" required placeholder="_Insertar_Genero (e.g. FPS, RPG)" autocomplete="off">
        
        <input type="submit" value="SUBIR_JUEGO">
    </form>
</div>

</body>
</html>