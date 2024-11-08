<?php
//tomar datos
$nombre = sanear($_REQUEST['nombre']);
$comentario = sanear($_REQUEST['texto']);

function sanear($texto)
{
    return htmlspecialchars(trim(strip_tags($texto)), ENT_QUOTES, "UTF-8");
}

//formatear texto
$texto = str_repeat("-", 30) . '<br/>' . $nombre . ':<br/>' . $comentario;

//guardar datos
$archivo = 'comentarios.txt';
$flujoEscritura = fopen($archivo, "a") or die("No se pudo abrir o crear el archivo.");
fwrite($flujoEscritura, $texto);
fclose($flujoEscritura);
//mostrar datos
$flujoLectura = fopen($archivo, "r");
print fread($flujoLectura,filesize($archivo));
