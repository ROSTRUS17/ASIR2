<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DADOS</title>
    <style>
        body {
            background-color: #0f0f0f;
            color: #00ff00;
            font-family: "Courier New", monospace;
            text-align: center;
            margin-top: 100px;
        }
        h1 {
            font-size: 2em;
            text-decoration: underline;
        }
        form {
            display: inline-block;
            border: 2px solid #00ff00;
            padding: 20px;
            text-align: left;
        }
        input, select {
            background-color: #111;
            color: #00ff00;
            border: 1px solid #00ff00;
            margin: 5px;
            padding: 5px;
            font-family: "Courier New", monospace;
        }
        input[type="submit"] {
            cursor: pointer;
            font-weight: bold;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #00ff00;
            color: #000;
        }
    </style>
</head>
<body>

<pre>
 ____ ___ ____ _____   _   _    _    ____ _  _____ _   _  ____ 
|  _ \_ _/ ___| ____| | | | |  / \  / ___| |/ /_ _| \ | |/ ___|
| | | | | |   |  _|   | |_| | / _ \| |   | ' / | ||  \| | |  _ 
| |_| | | |___| |___  |  _  |/ ___ \ |___| . \ | || |\  | |_| |
|____/___\____|_____| |_| |_/_/   \_\____|_|\_\___|_| \_|\____|
</pre> <br>

<form action="da02.php" method="post">

    <label for="numDados">Número de DADOS:</label>
    <select id="numDados" name="numDados" required>
        <option value="">-- Elige una opción --</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
    <br><br>

    <label for="numCaras">Número de CARAS:</label>
    <select id="numCaras" name="numCaras" required>
        <option value="">-- Elige una opción --</option>
        <option value="4">4</option>
        <option value="6">6</option>
        <option value="8">8</option>
        <option value="10">10</option>
        <option value="12">12</option>
        <option value="20">20</option>
    </select>
    <br><br>

    <label for="puntosOponente">Puntos del oponente:</label>
    <input type="number" id="puntosOponente" name="puntosOponente" min="0" required>
    <br><br>

    <input type="submit" value="TIRAR DADOS">
</form>

<pre>

     .-------.    ______
     /   o   /|   /\     \
     /_______/o|  /o \  o  \
     | o     | | /   o\_____\
     |   o   |o/ \o   /o    /
    |     o |/   \ o/  o  /
    '-------'     \/____o/
</pre>


</body>
</html>
