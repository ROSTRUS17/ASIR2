<?php
// 1. CONEXIONES
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$db = new mysqli('localhost', 'root', '', 'app_aceitunas');

// 2. FUNCIONES DE AYUDA CON LÓGICA DE CACHÉ
function consultarDato($key, $consultaSql, $esNumero, $db, $redis) {
    // Definir TTL: 10s para números, 60s para textos
    $ttl = $esNumero ? 10 : 60;
    
    // Intentar leer de Redis
    $cache = $redis->get($key);
    if ($cache) {
        return "<span style='color:green;'>[REDIS (TTL $ttl s)]</span> " . $cache;
    }

    // Si no está, ir a MySQL
    $resultado = $db->query($consultaSql);
    if ($fila = $resultado->fetch_array()) {
        $dato = $fila[0];
        // Guardar en Redis con el TTL correspondiente
        $redis->setex($key, $ttl, $dato);
        return "<span style='color:blue;'>[MySQL - Guardado en Caché]</span> " . $dato;
    }
    return "No encontrado";
}

// 3. PROCESAR ACCIONES (INSERTAR / BORRAR)
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'ins_vareador') {
        $nombre = $_POST['nombre'];
        $db->query("INSERT INTO vareadores (nombre) VALUES ('$nombre')");
    }
    // Al modificar o borrar, es buena práctica limpiar la caché
    if ($_POST['accion'] == 'borrar_v') {
        $id = $_POST['id'];
        $db->query("DELETE FROM vareadores WHERE id = $id");
        $redis->del("v_nombre:$id");
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>App Aceitunas - ASIR</title></head>
<body>
    <h1>🌿 App Aceitunas: Panel de Gestión</h1>

    <h3>Añadir Vareador</h3>
    <form method="POST">
        <input type="hidden" name="accion" value="ins_vareador">
        Nombre: <input type="text" name="nombre" required>
        <button type="submit">Guardar</button>
    </form>

    <hr>

    <h3>Listado de Vareadores (Consulta con TTL)</h3>
    <table border="1">
        <tr><th>ID (TTL 10s)</th><th>Nombre (TTL 60s)</th><th>Acciones</th></tr>
        <?php
        $res = $db->query("SELECT id FROM vareadores");
        while ($v = $res->fetch_assoc()) {
            $id = $v['id'];
            echo "<tr>";
            // Consultamos el ID (numérico)
            echo "<td>" . consultarDato("v_id:$id", "SELECT id FROM vareadores WHERE id=$id", true, $db, $redis) . "</td>";
            // Consultamos el Nombre (texto)
            echo "<td>" . consultarDato("v_nombre:$id", "SELECT nombre FROM vareadores WHERE id=$id", false, $db, $redis) . "</td>";
            echo "<td>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='accion' value='borrar_v'>
                        <input type='hidden' name='id' value='$id'>
                        <button type='submit'>Borrar</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <p><i>Nota: Refresca la página para ver cómo los datos pasan de color azul (MySQL) a verde (Redis).</i></p>
</body>
</html>