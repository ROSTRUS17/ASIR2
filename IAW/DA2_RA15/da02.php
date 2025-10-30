<?php
// coger datos del formulario
$numDados = intval($_POST['numDados']);
$numCaras = intval($_POST['numCaras']); // si viene del formulario
$puntosOponente = intval($_POST['puntosOponente']);

// tirar los dados y sumar puntos
$puntosMios = 0;
$resultadosDados = array();
for ($i = 1; $i <= $numDados; $i++) {
    $tirada = rand(1, $numCaras); // número aleatorio entre 1 y numCaras
    $resultadosDados[] = $tirada;
    $puntosMios += $tirada;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Juego de Dados</title>
<style>
/* estilo sencillo tipo terminal */
body { background: black; color: #00ff00; font-family: "Courier New", monospace; text-align:center; margin-top:30px; }
.terminal-box { display:inline-block; text-align:left; border:1px solid #00ff00; padding:12px; background:black; border-radius:4px; }
hr { border:none; border-top:1px dashed #00ff00; width:60%; margin:12px auto; }
ul { list-style:none; padding-left:0; }
resultado { font-weight:bold; margin-top:12px; text-transform:uppercase; }
ganado { color:#00ff00; }
perdido { color:#ff4d4d; }
empate { color:#ffff66; }
footer { margin-top:10px; font-size:0.9em; color:#00ff00; opacity:0.8; }
</style>
</head>
<body>

<pre>
==========================================
||             DICE HACKING            ||
==========================================
</pre>

<div class="terminal-box">
<div>
> Número de dados:     [ <?php echo $numDados; ?> ] <br>
> Número de caras:     [ <?php echo $numCaras; ?> ] <br>
</div>

<hr>

<div>
> Resultados de tus tirada:
</div>

<ul>
<?php foreach ($resultadosDados as $idx => $val): ?>
    <li>[ Dado <?php echo ($idx+1); ?> ] ---> Resultado: <?php echo $val; ?></li>
<?php endforeach; ?>
</ul>

<hr>

<pre>
> TOTAL DE PUNTOS: [ <?php echo $puntosMios; ?> ]

> PUNTOS DEL OPONENTE: [ <?php echo $puntosOponente; ?> ]
</pre>

<div class="resultado">
<?php
if ($puntosMios > $puntosOponente) {
    echo '<pre class="ganado"># ACCESS GRANTED #######################
# STATUS: HAS GANADO
########################################</pre>';
} elseif ($puntosMios < $puntosOponente) {
    echo '<pre class="perdido"># ACCESS DENIED ########################
# STATUS: HAS PERDIDO
########################################</pre>';
} else {
    echo '<pre class="empate"># SYSTEM LOCK ##########################
# STATUS: EMPATE
########################################</pre>';
}
?>
</div>

</div>

<pre>
==========================================
||        END OF TRANSMISSION           ||
==========================================
</pre>


</body>
</html>
