<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'db.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <title>/// NEW_AGENT ///</title>
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
            height: 100vh; /* Centrado vertical */
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

        /* FORMULARIOS HACKER */
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
            box-sizing: border-box; /* Para que el padding no rompa el ancho */
        }
        input[type="text"]:focus {
            outline: none;
            box-shadow: 0 0 10px #33ff00;
        }

        /* BOTONES */
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
    <a href="gestion_players.php" class="back-link"><< ATRAS</a>

    <h2>/// CREAR_JUGADOR ///</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $alias = $_POST['alias'];
        $nivel = $_POST['nivel'];
        
        $sql = "INSERT INTO PLAYERS (ALIAS, NIVEL) VALUES ('$alias', '$nivel')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:#fff; background:#1a5c00; padding:10px; text-align:center;'> >> AGENT SUCCESSFULLY UPLOADED << </p>";
        } else {
            echo "<p style='color:red; text-align:center;'> >> ERROR: SYSTEM FAILURE << <br>" . $conn->error . "</p>";
        }
    }
    ?>

    <form method="post" action="">
        <label>> INGRESAR_ALIAS:</label>
        <input type="text" name="alias" required placeholder="_Nombre_Usuario" autocomplete="off">
        
        <label>> ASIGNAR_NIVEL_RANKING:</label>
        <input type="text" name="nivel" required placeholder="_Rango (e.g. Bronce, Oro)" autocomplete="off">

        <input type="submit" value="SUBIR_DATOS">
    </form>
</div>

</body>
</html>