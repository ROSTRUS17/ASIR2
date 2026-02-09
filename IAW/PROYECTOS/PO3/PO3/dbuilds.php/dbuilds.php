<?php

function conectarDB(): PDO
{
    $db = new PDO('mysql:host=localhost;dbname=DB_POLIZIA', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

?>
